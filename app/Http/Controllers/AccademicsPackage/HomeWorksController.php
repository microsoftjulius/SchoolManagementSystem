<?php

namespace App\Http\Controllers\AccademicsPackage;

use App\Http\Controllers\Controller;
use App\AccademicsModel\HomeWork;
use App\Http\Resources\AccademicsResource\HomeWorksResource;
use Illuminate\Http\Request;

class HomeWorksController extends Controller
{
    protected function createHomeWork(){
        $home_work = new HomeWork();
        $home_work->year       = request()->year;
        $home_work->class_id   = request()->class_id;
        $home_work->subject_id = request()->subject_id;
        $home_work->created_by = request()->created_by;
        $home_work->paper_path = request()->paper_path; 
        $home_work->save();
    }

    protected function updateHomeWork(HomeWork $home_work, $id){
        $home_work->find($id)->update(array(
            'year'       => 2019,
            'class_id'   => 1,
            'subject_id' => 1,
            'created_by' => 1,
            'paper_path' => 'path_to_home_work'
        ));
    }

    protected function getAllHomeWorks(HomeWork $home_work){
        return HomeWorksResource::collection(HomeWork::join('class_rooms','class_rooms.id','home_works.class_id')
        ->join('subjects','subjects.id','home_works.subject_id')
        ->join('users','users.id','home_works.created_by')->get());
    }

    protected function getSingleHomeWork($id){
        return new HomeWorksResource(HomeWork::find($id));
    }

    protected function downloadHomeWork(HomeWork $home_work, $id){
        $file_name = $home_work->find($id)->value('time_table');
        $file = public_path(). "/home_work/$file_name";
        if(file_exists($file)){
            return response()->download($file);;
        }else{
            return redirect()->back()->withErrors("File was not found. Please contacts the person responsible to add the file. Sorry for any inconviniencies caused");
        }
    }

    protected function deleteHomeWork(HomeWork $home_work, $id){
        $home_work->find($id)->delete();
    }

    protected function validateHomeWork(){
        if(empty(request()->year)){
            return redirect()->back()->withErrors("Make sure you have attached a year");
        }elseif(empty(request()->paper_path)){
            return redirect()->back()->withErrors("Make sure you have attached a home work file");
        }else{
            return $this->createHomeWork();
        }
    }
}
