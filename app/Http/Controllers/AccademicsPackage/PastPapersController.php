<?php

namespace App\Http\Controllers\AccademicsPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AccademicsModel\PastPaper;
use App\AccademicsModel\Subject;
use App\ClassesModels\ClassRooms as ClassRoomsModel;
use App\Http\Resources\AccademicsResource\PastPapersResource;

class PastPapersController extends Controller
{
    protected function createPastPaper(){
        
        $class_id = ClassRoomsModel::where('class_name',request()->class_id)->value('id');
        if(empty($class_id)){ 
            return redirect()->back()->withErrors('Please select a Class to continue');}

        $subject_id = Subject::where('subject_name',request()->subject_id)->value('id');
        if(empty($subject_id)){ return redirect()->back()->withErrors('Please select a Subject to continue');}
    

        $past_paper = new PastPaper();
        $past_paper->year       = request()->year;
        $past_paper->class_id   = $class_id;
        $past_paper->subject_id = $subject_id;
        $past_paper->created_by = request()->created_by;
        $past_paper->paper_path = request()->paper_path; 
        $past_paper->save();
        return redirect()->back()->with('msg',"New Past Paper has been created Successfully");
    }

    protected function updatePastPapers(PastPaper $past_paper, $id){
        $past_paper->find($id)->update(array(
            'year'       => 2019,
            'class_id'   => 1,
            'subject_id' => 1,
            'created_by' => 1,
            'paper_path' => 'path_to_home_work'
        ));
    }

    protected function getAllPastPapers(PastPaper $past_paper){
        $collection = PastPapersResource::collection(PastPaper::all());
        $subjects = Subject::all();
        $class_rooms = ClassRoomsModel::all();
        return view('admin_pages.past_papers',compact('collection','subjects','class_rooms'));
    }

    protected function getSinglePastPaper($id){
        return new PastPapersResource(PastPaper::find($id));
    }

    protected function downloadSinglePastPaper(PastPaper $past_paper, $id){
        $file_name = $past_paper->find($id)->value('paper_path');
        $file = public_path(). "/home_work/$file_name";
        if(file_exists($file)){
            return response()->download($file);;
        }else{
            return redirect()->back()->withErrors("File was not found. Please contacts the person responsible to add the file. Sorry for any inconviniencies caused");
        }
    }

    protected function deletePastPaper(PastPaper $past_paper, $id){
        $past_paper->find($id)->delete();
        return redirect()->back()->with('msg',"A Past Paper has been deleted");
    }

    protected function validatePastPapers(){
        if(empty(request()->year)){
            return redirect()->back()->withErrors("Make sure you have attached a year");
        }elseif(empty(request()->paper_path)){
            return redirect()->back()->withErrors("Make sure you have attached a home work file");
        }else{
            return $this->createPastPaper();
        }
    }

}
