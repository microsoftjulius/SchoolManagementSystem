<?php

namespace App\Http\Controllers\AccademicsPackage;

use App\Http\Controllers\Controller;
use App\AccademicsModel\HomeWork;
use App\Http\Resources\AccademicsResource\HomeWorksResource;
use Illuminate\Http\Request;
use App\ClassesModels\ClassRooms;
use App\AccademicsModel\Subject;
use Carbon\Carbon;

class HomeWorksController extends Controller
{
    protected function createHomeWork(){
        $class_id   = ClassRooms::where('class_name',request()->class_name)->value('id');
        if(empty($class_id)){ return redirect()->back()->withErrors("Please Select a class from the existing list");}
        $subject_id = Subject::where('subject_name',request()->subject_name)->value('id');
        if(empty($subject_id)){ return redirect()->back()->withErrors("Please Select a Subject from the existing list");}

        $paper_path = request()->paper_path;
        $paper = $paper_path->getClientOriginalName();
        $paper_path->move('homeworks/',$paper);

        $home_work = new HomeWork();
        $home_work->year       = Carbon::now()->year;
        $home_work->class_id   = $class_id;
        $home_work->subject_id = $subject_id;
        $home_work->created_by = request()->created_by;
        $home_work->paper_path = $paper; 
        $home_work->save();
        return redirect()->back()->with('msg',"Home Work Upload was successful");
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
        $collection = HomeWorksResource::collection(HomeWork::all());
        $class_rooms = ClassRooms::get();
        $subjects = Subject::all();
        return view('admin_pages.home_work',compact('collection','class_rooms','subjects'));
    }

    protected function getSingleHomeWork($id){
        return new HomeWorksResource(HomeWork::find($id));
    }

    protected function downloadHomeWork(HomeWork $home_work, $id){
        $file_name = $home_work->find($id)->value('paper_path');
        $file = public_path(). "/home_work/$file_name";
        if(file_exists($file)){
            return response()->download($file);;
        }else{
            return redirect()->back()->withErrors("File was not found. Please contacts the person responsible to add the file. Sorry for any inconviniencies caused");
        }
    }

    protected function deleteHomeWork(HomeWork $home_work, $id){
        $home_work->find($id)->delete();

        return redirect()->back()->with('msg',"A home work has been deleted successfully");
    }

    protected function validateHomeWork(){

        
        if(empty(request()->subject_name)){
            return redirect()->back()->withErrors("Make sure you have selected a Subject from the list");
        }elseif(empty(request()->paper_path)){
            return redirect()->back()->withErrors("Make sure you have attached a home work file");
        }elseif(empty(request()->class_name)){
            return redirect()->back()->withErrors("Make sure you have selected a class from the list");
        }else{
            return $this->createHomeWork();
        }
    }
}
