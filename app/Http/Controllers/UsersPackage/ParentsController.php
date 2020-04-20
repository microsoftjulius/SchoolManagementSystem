<?php

namespace App\Http\Controllers\UsersPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PersonsResources\ParentsResource;
use App\UsersPackage\ParentsModel;
use App\User;

class ParentsController extends Controller
{
    public function __construct(){
        $this->person = new GeneralPerson();
        $this->register = new RegistrationController();
    }
    protected function createParent(){
        $this->register->registerUser();
        $user_id = User::where('name',($this->person->getFirstName() . " " . $this->person->getLastname()))
                        ->where('email',($this->person->getFirstName() . $this->person->getTelephoneNumber()))->value('id');
        $parent = new ParentsModel();
        $parent->created_by    = 1;
        $parent->pfirst_name    = $this->person->getFirstName();
        $parent->plast_name     = $this->person->getLastname();
        $parent->date_of_birth = $this->person->getDateOfBirth();
        $parent->image_path    = $this->person->getUserPhoto();     
        $parent->RelationShip  = $this->person->getRelationShip();
        $parent->District      = $this->person->getDistrict();     
        $parent->Village       = $this->person->getVillage();      
        $parent->NIN           = $this->person->getNationalIdentificationNumber();        
        $parent->Telephone     = $this->person->getTelephoneNumber();
        $parent->save();   
    }

    protected function editParent(ParentsModel $parent, $id){
        $parent->find($id)->update(array('pfirst_name' => 'Joan'));
    }

    protected function getAllParents(){
        $collection = ParentsResource::collection(ParentsModel::all());
        return view('admin_pages.parents',compact('collection'));
    }

    protected function getIndividualParent($id){
        return new ParentsResource(ParentsModel::find($id));
    }

    protected function validateParent(){
        if(empty($this->person->getFirstName())){ 
            return redirect()->back()->withErrors("First Name is required"); 
        }elseif(empty($this->person->getLastname())){ 
            return redirect()->back()->withErrors("Last Name is required"); 
        }elseif(empty($this->person->getDateOfBirth())){ 
            return redirect()->back()->withErrors("Date Of Birth is required"); 
        }elseif(empty($this->person->getUserPhoto())){ 
            return redirect()->back()->withErrors("Image is required"); 
        }elseif(empty($this->person->getRelationShip())){ 
            return redirect()->back()->withErrors("What Relationship do you have with the student?"); 
        }elseif(empty($this->person->getDistrict())){ 
            return redirect()->back()->withErrors("Which District do you come from?"); 
        }elseif(empty($this->person->getVillage())){ 
            return redirect()->back()->withErrors("Which Village Do you come from"); 
        }elseif(empty($this->person->getNationalIdentificationNumber())){ 
            return redirect()->back()->withErrors("Please attach your N.I.N"); 
        }elseif(empty($this->person->getTelephoneNumber())){ 
            return redirect()->back()->withErrors("Please attach your phone number"); 
        }else{ 
            return $this->createParent();
        }
    }
}
