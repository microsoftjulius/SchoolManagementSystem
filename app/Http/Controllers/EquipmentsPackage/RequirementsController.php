<?php

namespace App\Http\Controllers\EquipmentsPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EquipmentsPackage\Requirement;
use App\Http\Resources\EquipmentsResources\Requirements as RequirementsResource;

class RequirementsController extends Controller
{
    protected function createRequirement(){
        $requirement = new Requirement();
        $requirement->requirement_name = request()->requirement_name;
        $requirement->number_bought    = request()->number_bought;
        $requirement->created_by       = request()->created_by;
        $requirement->student_id       = request()->student_id;
        $requirement->save();
    }

    protected function updateRequirement(Requirement $requirement, $id){
        $requirement->find($id)->update(array(
            'requirement_name' => 'bench',
            'number_bought'  => 34,
            'created_by'     => 1
        ));
    }

    protected function getAllRequirements(){
        $collection = RequirementsResource::collection(Requirement::all());
        return $collection;
    }

    protected function deleteRequirement(Requirement $requirement, $id){
        $requirement->find($id)->delete();
    }

    protected function validateRequirement(){
        if(empty(request()->requirement_name)){
            return redirect()->back()->withErrors("Please add the name of the requirement to continue");
        }
        if(empty(request()->number_bought)){
            return redirect()->back()->withErrors("Please add the number of the requirements that have been brought to continue");
        }
        if(empty(request()->student_id)){
            return redirect()->back()->withErrors("Please select a student who has brought them to continue");
        }
        else{
            return $this->createRequirement();
        }
    }
}
