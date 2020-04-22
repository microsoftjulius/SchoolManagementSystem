<?php

namespace App\Http\Controllers\ActivitiesPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ActivitiesPackage\CocuricularActivitesModel as Activity;
use App\Http\Resources\ActivitiesResource\ActivitiesResource;

class CocuricularActivitiesController extends Controller
{
    protected function createCoCurricularActivities(){
        $activity = new Activity();
        $activity->activity   = strtolower(request()->activity);
        $activity->date       = request()->date;
        $activity->created_by = request()->created_by;
        $activity->save();

        return redirect()->back()->with('msg',"Activity has been created successfully");
    }

    protected function updateActivity(Activity $activity, $id){
        $activity->find($id)->update(array(
            'activity'   => 'Soccer',
            'date'       => '2020-02-23 00:00:00',
            'created_by' => 1
        ));
    }

    protected function getAllActivities(){
        $collection = ActivitiesResource::collection(Activity::all());
        return view('admin_pages.co_curricular_activities',compact('collection'));
    }

    protected function deleteActivity(Activity $activity, $id){
        $activity->find($id)->delete();
    }
    
    protected function validateActivities(){
        if(empty(request()->activity)){
            return redirect()->back()->withErrors('Please attach an activity');
        }
        if(empty(request()->date)){
            return redirect()->back()->withErrors('Please attach attach a date to this activity');
        }elseif(Activity::where('activity',strtolower(request()->activity))->exists()){
            return redirect()->back()->withErrors("The added activity already exists");
        }else{
            return $this->createCoCurricularActivities();
        }
    }
}
