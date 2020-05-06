<?php

namespace App\Http\Controllers\UsersPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsersPackage\Students as Student;
use App\UsersPackage\ParentsModel;
use App\ClassesModels\ClassRooms as ClassRoomsModel;
use App\Http\Resources\PersonsResources\StudentsResource;
use App\User;

class Students extends Controller
{
    public function __construct(){
        $this->person = new GeneralPerson();
        $this->register = new RegistrationController();
    }

    protected function createStudent(){
        //Creating a user account to login
        if(User::where('email',$this->person->getFirstName() . $this->person->getTelephoneNumber())->exists()){
            return redirect()->back()->withErrors("The Student being registered already exists. Consider using the Other name if he / she doesn't exist");
        }
        $this->register->registerUser();
        //getting the account id and mapping it to the table
        $students_id = User::where('name',($this->person->getFirstName() . " " . $this->person->getLastname()))
                        ->where('email',($this->person->getFirstName() . $this->person->getTelephoneNumber()))->value('id');
        if(Student::where('student_id',$students_id)->exists()){ return redirect()->back()->withErrors("Student already exists");}
        $parent_id = ParentsModel::where('pfirst_name',explode(' ',request()->parent_names)[0])
        ->where('plast_name',explode(' ',request()->parent_names)[1])->value('id');
        if(empty($parent_id)){ return redirect()->back()->withErrors("Please Select a Parent from the list");}
        
        $class_id = ClassRoomsModel::where('class_name', request()->class_name)->value('id');
        if(empty($class_id)){
            return redirect()->back()->withErrors("Please Select a class to continue");}

        
        $image = $this->person->getUserPhoto();
        $image_path = $image->getClientOriginalName();
        $image->move('bootstrap/students',$image_path);
    
        $student = new Student(); // creating an object of student
        $student->created_by     = 1;
        $student->student_id     = $students_id;
        $student->former_school  = request()->former_school;
        $student->sfirst_name    = $this->person->getFirstName();
        $student->slast_name     = $this->person->getLastname();
        $student->date_of_birth  = $this->person->getDateOfBirth();
        $student->class_id       = $class_id;
        $student->image_path     = $image_path;
        $student->gender         = request()->gender;
        $student->guardian_id    = $parent_id;
        $student->save(); 

        return redirect()->back()->with('msg',"New Student has been created Successfully");
    }

    protected function editStudent(Student $student, $id){
        $student->find($id)->update(array(
            'guardian_id' => 2,
            'class_id'    => 1
        ));
    }

    protected function getAllStudents(){
        $collection = StudentsResource::collection(Student::where('status','!=','expelled')->get());
        $parents = ParentsModel::all();
        $classes = ClassRoomsModel::all();
        //return $collection;
        return view('admin_pages.students',compact('collection','parents','classes'));
    }

    protected function getIndividualStudent($id){
        $collection = new StudentsResource(Student::find($id));
        $meta = $collection->with('meta');
        return view('admin_pages.report', compact('collection'))->with('meta', $meta);
    }

    protected function suspendStudent(Student $student, $id){
        $student->find($id)->update(array(
            'status' => 'suspended',
        ));
        return redirect()->back()->with('msg',"Student has been suspended successfully");
    }
    
    protected function activateStudent(Student $student, $id){
        $student->find($id)->update(array(
            'status' => 'active',
        ));
        return redirect()->back()->with('msg',"Student has been activated Successfully");
    }

    protected function expellStudent(Student $student, $id){
        $student->find($id)->update(array(
            'status' => 'expelled',
        ));
        return redirect()->back()->with('msg',"Student has been expelled Successfully");
    }

    protected function validateStudent(){
        if(empty($this->person->getFirstName())){ return redirect()->back()->withErrors("First Name is required"); }
        elseif(empty($this->person->getLastname())){ return redirect()->back()->withErrors("Last Name is required"); }
        elseif(empty($this->person->getDateOfBirth())){ return redirect()->back()->withErrors("Date Of Birth is required"); }
        elseif(empty($this->person->getUserPhoto())){ return redirect()->back()->withErrors("Image is required"); }
        elseif(empty(request()->parent_names)){ return redirect()->back()->withErrors("please attach a guardian to this student"); }
        else{ return $this->createStudent();}
    }
}
