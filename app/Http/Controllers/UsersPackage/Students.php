<?php

namespace App\Http\Controllers\UsersPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsersPackage\Students as Student;
use App\Http\Controllers\UsersPackage\GeneralPerson;
use App\Http\Resources\PersonsResources\StudentsResource;

class Students extends Controller
{
    public function __construct(){
        $this->person = new GeneralPerson();
    }

    protected function createStudent(){
        $student = new Student(); // creating an object of student
        $student->first_name    = $this->person->getFirstName();
        $student->last_name     = $this->person->getLastname();
        $student->date_of_birth = $this->person->getDateOfBirth();
        $student->image_path    = $this->person->getUserPhoto();
        $student->guardian_id   = request()->guardian_id;
        $student->class_id      = request()->class_id;
        $student->save(); 
    }

    protected function editStudent(Student $student, $id){
        $student->find($id)->update(array(
            'guardian_id' => 2,
            'class_id'    => 1
        ));
    }

    protected function getAllStudents(){
        return StudentsResource::collection(Student::all());
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

    protected function validatePerson(){
        if(empty($this->person->getFirstName())){ return redirect()->back()->withErrors("First Name is required"); }
        elseif(empty($this->person->getLastname())){ return redirect()->back()->withErrors("Last Name is required"); }
        elseif(empty($this->person->getDateOfBirth())){ return redirect()->back()->withErrors("Date Of Birth is required"); }
        elseif(empty($this->person->getUserPhoto())){ return redirect()->back()->withErrors("Image is required"); }
        elseif(empty(request()->guardian_id)){ return redirect()->back()->withErrors("please attach a guardian to this student"); }
        elseif(empty(request()->class_id)){ return redirect()->back()->withErrors("Please attach a class to this student"); }
        else{ return $this->createStudent();}
    }
}
