<?php

namespace App\Http\Controllers\UsersPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\UsersPackage\GeneralPerson;
use App\Http\Resources\PersonsResources\ParentsResource;
use App\UsersPackage\Parentsmodel;

class ParentsController extends Controller
{
    public function __construct(){
        $this->person = new GeneralPerson();
    }
    protected function createParent(){
        $parent = new Parentsmodel();
        $parent->first_name    = $this->person->getFirstName();
        $parent->last_name     = $this->person->getLastname();
        $parent->date_of_birth = $this->person->getDateOfBirth();
        $parent->image_path    = $this->person->getUserPhoto();     
        $parent->RelationShip  = $this->person->getRelationShip();
        $parent->District      = $this->person->getDistrict();     
        $parent->Village       = $this->person->getVillage();      
        $parent->NIN           = $this->person->getNationalIdentificationNumber();        
        $parent->Telephone     = $this->person->getTelephoneNumber();
        $parent->save();   
    }

    protected function editParent(Parentsmodel $parent, $id){
        $parent->find($id)->update(array('first_name' => 'Joan'));
    }

    protected function getAllParents(){
        return ParentsResource::collection(Parentsmodel::all());
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
