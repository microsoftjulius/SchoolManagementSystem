<?php

namespace App\Http\Controllers\AccademicsPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AccademicsModel\PastPaper;
use App\Http\Resources\AccademicsResource\PastPapersResource;

class PastPapersController extends Controller
{
    protected function createPastPaper(){
        $past_paper = new PastPaper();
        $past_paper->year       = request()->year;
        $past_paper->class_id   = request()->class_id;
        $past_paper->subject_id = request()->subject_id;
        $past_paper->created_by = request()->created_by;
        $past_paper->paper_path = request()->paper_path; 
        $past_paper->save();
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
        return PastPapersResource::collection(PastPaper::join('class_rooms','class_rooms.id','past_papers.class_id')
        ->join('subjects','subjects.id','past_papers.subject_id')
        ->join('users','users.id','past_papers.created_by')->get());
    }

    protected function getSinglePastPaper($id){
        return new PastPapersResource(PastPaper::find($id));
    }

    protected function downloadSinglePastPaper(PastPaper $past_paper, $id){
        $file_name = $past_paper->find($id)->value('time_table');
        $file = public_path(). "/home_work/$file_name";
        if(file_exists($file)){
            return response()->download($file);;
        }else{
            return redirect()->back()->withErrors("File was not found. Please contacts the person responsible to add the file. Sorry for any inconviniencies caused");
        }
    }

    protected function deletePastPaper(PastPaper $past_paper, $id){
        $past_paper->find($id)->delete();
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
