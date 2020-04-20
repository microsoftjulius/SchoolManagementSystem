<?php

namespace App\Http\Controllers\UsersPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsersPackage\Students as Student;
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
        $this->register->registerUser();

        //getting the account id and mapping it to the table
        $user_id = User::where('name',($this->person->getFirstName() . " " . $this->person->getLastname()))
                        ->where('email',($this->person->getFirstName() . $this->person->getTelephoneNumber()))->value('id');
        
        $student = new Student(); // creating an object of student
        $student->created_by     = 1;
        $student->former_school  = request()->former_school;
        $student->sfirst_name     = $this->person->getFirstName();
        $student->slast_name      = $this->person->getLastname();
        $student->date_of_birth  = $this->person->getDateOfBirth();
        $student->image_path     = $this->person->getUserPhoto();
        $student->guardian_id    = request()->guardian_id;
        $student->save(); 
    }

    protected function editStudent(Student $student, $id){
        $student->find($id)->update(array(
            'guardian_id' => 2,
            'class_id'    => 1
        ));
    }

    protected function getAllStudents(){
        $collection = StudentsResource::collection(Student::all());
        //return $collection;
        return view('admin_pages.students',compact('collection'));
    }

    protected function getIndividualStudent($id){
        return new StudentsResource(Student::find($id));
    }

    protected function suspendStudent(Student $student, $id){
        $student->find($id)->update(array(
            'status' => 'suspended',
        ));
    }

    protected function expellStudent(Student $student, $id){
        $student->find($id)->update(array(
            'status' => 'expelled',
        ));
    }

    protected function validateStudent(){
        if(empty($this->person->getFirstName())){ return redirect()->back()->withErrors("First Name is required"); }
        elseif(empty($this->person->getLastname())){ return redirect()->back()->withErrors("Last Name is required"); }
        elseif(empty($this->person->getDateOfBirth())){ return redirect()->back()->withErrors("Date Of Birth is required"); }
        elseif(empty($this->person->getUserPhoto())){ return redirect()->back()->withErrors("Image is required"); }
        elseif(empty(request()->guardian_id)){ return redirect()->back()->withErrors("please attach a guardian to this student"); }
        else{ return $this->createStudent();}
    }
}
