<?php

namespace App\Http\Controllers\ActivitiesPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ActivitiesResource\DutyResource;
use App\ActivitiesPackage\DutiesModel as Duty;

class DutiesController extends Controller
{
    protected function createDuty(){
        $duty = new Duty();
        $duty->teacher_id = request()->teacher_id;
        $duty->week       = request()->week;
        $duty->term_id    = request()->term_id;
        $duty->created_by = request()->created_by;
        $duty->save();
    }

    protected function updateDuty(Duty $duty, $id){
        $duty->find($id)->update(array(
            'teacher_id' => 2,
            'week'       => 1,
            'term_id'    => 1,
            'created_by' => 1,
        ));
    }

    protected function getAllDuties(){
        $collection = DutyResource::collection(Duty::all());
        return view('admin_pages.duties',compact('collection'));
    }

    protected function deleteDuty(Duty $duty, $id){
        $duty->find($id)->delete();
    }

    protected function validateDuty(){
        if(empty(request()->teacher_id)){
            return redirect()->back()->withErrors("please select a teacher to continue");
        }
        if(empty(request()->week)){
            return redirect()->back()->withErrors("Please add a week number");
        }
        if(empty(request()->term_id)){
            return redirect()->back()->withErrors("Please select a term to continue");
        }else{
            return $this->createDuty();
        }
    }
}
