<?php

namespace App\Http\Controllers\UsersPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsersPackage\Teachersmodel as Teacher;
use App\Http\Controllers\UsersPackage\GeneralPerson;
use App\Http\Resources\PersonsResources\TeachersResource;

class TeachersController extends Controller
{
    public function __construct(){
        $this->person = new GeneralPerson();
    }

    protected function createTeacher(){
        $teacher = new Teacher();
        $teacher->first_name    = $this->person->getFirstName();
        $teacher->last_name     = $this->person->getLastname();
        $teacher->date_of_birth = $this->person->getDateOfBirth();
        $teacher->image_path    = $this->person->getUserPhoto();     
        $teacher->District      = $this->person->getDistrict();     
        $teacher->Village       = $this->person->getVillage();      
        $teacher->NIN           = $this->person->getNationalIdentificationNumber();        
        $teacher->Telephone     = $this->person->getTelephoneNumber();
        $teacher->role_id       = request()->role_id;
        $teacher->save();   
    }

    protected function editTeacher(Teacher $teacher, $id){
        $teacher->find($id)->update(array('first_name' => 'Joan'));
    }

    protected function getAllTeachers(){
        return TeachersResource::collection(Teacher::all());
    }

    protected function getIndividualTeacher($id){
        return new TeachersResource(Teacher::find($id));
    }

    protected function suspendTeacher(Teacher $teacher, $id){
        $teacher->find($id)->update(array('status' => 'suspended'));
    }

    protected function expelTeacher(Teacher $teacher, $id){
        $teacher->find($id)->update(array('status' => 'expelled'));
    }

    protected function assignRole(Teacher $teacher, $id){
        $teacher->find($id)->update(array('role_id' => '4'));
    }

    protected function validateTeacher(){
        if(empty($this->person->getFirstName())){ 
            return redirect()->back()->withErrors("First Name is required"); 
        }elseif(empty($this->person->getLastname())){ 
            return redirect()->back()->withErrors("Last Name is required"); 
        }elseif(empty($this->person->getDateOfBirth())){ 
            return redirect()->back()->withErrors("Date Of Birth is required"); 
        }elseif(empty($this->person->getUserPhoto())){ 
            return redirect()->back()->withErrors("Image is required"); 
        }elseif(empty($this->person->getDistrict())){ 
            return redirect()->back()->withErrors("Which District do you come from?"); 
        }elseif(empty($this->person->getVillage())){ 
            return redirect()->back()->withErrors("Which Village Do you come from"); 
        }elseif(empty($this->person->getNationalIdentificationNumber())){ 
            return redirect()->back()->withErrors("Please attach your N.I.N"); 
        }elseif(empty($this->person->getTelephoneNumber())){ 
            return redirect()->back()->withErrors("Please attach your phone number"); 
        }elseif(empty(request()->role_id)){ 
            return redirect()->back()->withErrors("Please attach a role to this teacher"); 
        }else{ 
            return $this->createTeacher();
        }
    }
}
