<?php

namespace App\Http\Controllers\UsersPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsersPackage\Employeesmodel as Employee;
use App\ClassesModels\ClassRooms as ClassRoomsModel;
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

        if(User::where('name',($this->person->getFirstName() . " " . $this->person->getLastname()))
        ->where('email',($this->person->getFirstName() . $this->person->getTelephoneNumber()))->exists()){
            return redirect()->back()->withErrors("Employee Already exists");
        }

        $this->register->registerUser();
        $user_id = User::where('name',($this->person->getFirstName() . " " . $this->person->getLastname()))
                        ->where('email',($this->person->getFirstName() . $this->person->getTelephoneNumber()))->value('id');


        $employee_id = User::where('name',($this->person->getFirstName() . " " . $this->person->getLastname()))
        ->where('email',($this->person->getFirstName() . $this->person->getTelephoneNumber()))->value('id');
        if(Employee::where('employee_id',$employee_id)->exists()){ return redirect()->back()->withErrors("Employee already exists");}
        //creating comma separated certificate

        $class_id = ClassRoomsModel::where('class_name', request()->class_name)->value('id');
        if(empty($class_id)){
            return redirect()->back()->withErrors("Please Select a class to continue");}

        $image = $this->person->getUserPhoto();
        $image_path = $image->getClientOriginalName();
        $image->move('bootstrap/employees',$image_path);
    
        $certificate      = request()->certificates;
        $certificate_path = $certificate->getClientOriginalName();
        $certificate->move('bootstrap/employees',$certificate_path);
    
        $employee = new Employee();
        $employee->efirst_name        = $this->person->getFirstName();
        $employee->created_by         = request()->created_by;
        $employee->employee_id        = $employee_id;
        $employee->class_id           = $class_id;
        $employee->elast_name         = $this->person->getLastname();
        $employee->date_of_birth      = $this->person->getDateOfBirth();
        $employee->image_path         = $image_path;    
        $employee->District           = $this->person->getDistrict();     
        $employee->Village            = $this->person->getVillage();      
        $employee->NIN                = $this->person->getNationalIdentificationNumber();        
        $employee->Telephone          = $this->person->getTelephoneNumber();
        $employee->role_id            = request()->role_id;
        $employee->gender             = request()->gender;
        $employee->level_of_education = request()->level_of_education;
        $employee->certificates       = $certificate;
        $employee->save();   

        return redirect()->back()->with('msg',"New Employee has been added to the team");
    }

    protected function editEmployee(Employee $employee, $id){
        $employee->find($id)->update(array('efirst_name' => 'Joan'));
    }

    protected function getAllEmployees(){
        $collection = EmployeesResource::collection(Employee::where('status','!=','expelled')->get());
        $classes = ClassRoomsModel::all();
        return view('admin_pages.employees',compact('collection','classes'));
        //return $collection;
    }

    protected function getIndividualEmployee($id){
        $collection = new EmployeesResource(Employee::find($id));
        return view('admin_pages.single_employee',compact('collection'));
    }

    protected function suspendEmployee(Employee $employee, $id){
        $employee->find($id)->update(array('status' => 'suspended'));
        return redirect()->back()->with('msg',"Employee has been suspended successfully");
    }

    protected function activateEmployee(Employee $employee, $id){
        $employee->find($id)->update(array('status' => 'active'));
        return redirect()->back()->with('msg',"Employee has been activated Successfully");
    }


    protected function expelEmployee(Employee $employee, $id){
        $employee->find($id)->update(array('status' => 'expelled'));
        return redirect()->back()->with('msg',"Employee has been Expelled Successfully");
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
        }elseif(empty(request()->level_of_education)){ 
            return redirect()->back()->withErrors("Please Add a level of Education"); 
        }else{ 
            return $this->createEmployee();
        }
    }
}
