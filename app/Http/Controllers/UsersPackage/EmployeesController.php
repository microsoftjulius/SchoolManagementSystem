<?php

namespace App\Http\Controllers\UsersPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsersPackage\Employeesmodel as Employee;
use App\Http\Controllers\UsersPackage\GeneralPerson;
use App\Http\Resources\PersonsResources\EmployeesResource;
use App\User;

class EmployeesController extends Controller
{
    public function __construct(){
        $this->person = new GeneralPerson();
        $this->register = new RegistrationController();
    }

    protected function createEmployee(){
        $this->register->registerUser();
        $user_id = User::where('name',($this->person->getFirstName() . " " . $this->person->getLastname()))
                        ->where('email',($this->person->getFirstName() . $this->person->getTelephoneNumber()))->value('id');

        //creating comma separated certificate
        $certificates = implode(",",request()->certificates);

        $employee = new Employee();
        $employee->first_name         = $this->person->getFirstName();
        $employee->user_id            = $user_id;
        $employee->created_by         = 1;
        $employee->last_name          = $this->person->getLastname();
        $employee->date_of_birth      = $this->person->getDateOfBirth();
        $employee->image_path         = $this->person->getUserPhoto();     
        $employee->District           = $this->person->getDistrict();     
        $employee->Village            = $this->person->getVillage();      
        $employee->NIN                = $this->person->getNationalIdentificationNumber();        
        $employee->Telephone          = $this->person->getTelephoneNumber();
        $employee->role_id            = request()->role_id;
        $employee->level_of_education = request()->level_of_education;
        $employee->certificates       = $certificates;
        $employee->save();   
    }

    protected function editEmployee(Employee $employee, $id){
        $employee->find($id)->update(array('first_name' => 'Joan'));
    }

    protected function getAllEmployees(){
        return EmployeesResource::collection(Employee::all());
    }

    protected function getIndividualEmployee($id){
        return new EmployeesResource(Employee::find($id));
    }

    protected function suspendEmployee(Employee $employee, $id){
        $employee->find($id)->update(array('status' => 'suspended'));
    }

    protected function expelEmployee(Employee $employee, $id){
        $employee->find($id)->update(array('status' => 'expelled'));
    }

    protected function assignRole(Employee $employee, $id){
        $employee->find($id)->update(array('role_id' => '4'));
    }

    protected function validateEmployee(){
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
            return redirect()->back()->withErrors("Please attach a role to this Employee"); 
        }elseif(empty(request()->level_of_education)){ 
            return redirect()->back()->withErrors("Please Add a level of Education"); 
        }else{ 
            return $this->createEmployee();
        }
    }
}
