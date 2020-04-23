<?php

namespace App\Http\Controllers\ActivitiesPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsersPackage\Employeesmodel as Employee;
use App\AccademicsModel\Term;
use App\Http\Resources\ActivitiesResource\DutyResource;
use App\ActivitiesPackage\DutiesModel as Duty;

class DutiesController extends Controller
{
    protected function createDuty(){
        $teacher_id = Employee::where('efirst_name',explode(' ',request()->teacher_names)[0])
        ->where('elast_name',explode(' ',request()->teacher_names)[1])->value('id');
        if(empty($teacher_id)){ return redirect()->back()->withErrors("Please Select a Teacher from the list");}
        $term_id = Term::where('term',request()->term)->value('id');
        if(empty($term_id)){ return redirect()->back()->withErrors("Please Select a Term from the list");}
        $duty = new Duty();
        $duty->teacher_id = $teacher_id;
        $duty->week       = strtoUpper(request()->week);
        $duty->term_id    = $term_id;
        $duty->created_by = request()->created_by;
        $duty->save();

        return redirect()->back()->with('msg',"New Teacher has been assigned Duty");
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
        $teachers = Employee::all();
        $terms = Term::all();
        return view('admin_pages.duties',compact('collection','teachers','terms'));
    }

    protected function deleteDuty(Duty $duty, $id){
        $duty->find($id)->delete();
    }

    protected function validateDuty(){
        if(empty(request()->teacher_names)){
            return redirect()->back()->withErrors("please select a teacher to continue");
        }
        if(empty(request()->week)){
            return redirect()->back()->withErrors("Please add a week number");
        }
        if(empty(request()->term)){
            return redirect()->back()->withErrors("Please select a term to continue");
        }else{
            return $this->createDuty();
        }
    }
}
