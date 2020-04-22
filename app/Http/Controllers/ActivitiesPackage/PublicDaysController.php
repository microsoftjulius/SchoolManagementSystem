<?php

namespace App\Http\Controllers\ActivitiesPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ActivitiesPackage\PublicDaysModel;
use App\Http\Resources\ActivitiesResource\PublicDaysResource;

class PublicDaysController extends Controller
{
    protected function createPublicDays(){
        $public_days = new PublicDaysModel();
        $public_days->public_day = strtolower(request()->public_day);
        $public_days->date       = request()->date;
        $public_days->created_by = request()->created_by;
        $public_days->save();
        return redirect()->back()->with('msg',"New public day has been created successfully");
    }

    protected function updatePublicDay(PublicDaysModel $public_days, $id){
        $public_days->find($id)->update(array(
            'public_day'   => 'Easter Sunday',
            'date'       => '2020-02-23 00:00:00',
            'created_by' => 1
        ));
    }

    protected function getAllPublicDays(){
        $collection = PublicDaysResource::collection(PublicDaysModel::all());
        return view('admin_pages.public_days',compact('collection'));
    }

    protected function deletePublicDay(PublicDaysModel $public_days, $id){
        $public_days->find($id)->delete();
    }

    protected function validatePublicDay(){
        if(empty(request()->public_day)){
            return redirect()->back()->withErrors("please select a public day to continue");
        }
        if(empty(request()->date)){
            return redirect()->back()->withErrors("Please add a week number");
        }elseif(PublicDaysModel::where('public_day',strtolower(request()->public_day))->exists()){
            return redirect()->back()->withErrors("The added Public Activity already exists");
        }else{
            return $this->createPublicDays();
        }
    }
}
