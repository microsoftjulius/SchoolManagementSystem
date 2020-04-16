<?php

namespace App\Http\Controllers\AccademicsPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AccademicsModel\ExamMarks;
use App\Http\Resources\AccademicsResource\ExamMarksResource;

class ExamsController extends Controller
{
    protected function createExam(){
        $exam = new ExamMarks();
        $exam->subject_id = request()->subject_id;
        $exam->student_id = request()->student_id;
        $exam->marks      = request()->marks;
        $exam->comment    = request()->comment;
        $exam->created_by = request()->created_by;
        $exam->class_id   = request()->class_id;
        $exam->save();
    }

    protected function updateExam(ExamMarks $exam, $id){
        $exam->find($id)->update(array(
            'subject_id' => 1,
            'student_id' => 1,
            'marks'      => 77,
            'comment'    => 'Very Good',
            'created_by' => 1,
            'class_id'   => 1
        ));
    }

    protected function getExamMarksForStudents(){
        $collection = ExamMarksResource::collection(ExamMarks::all());
        return $collection;
    }

    protected function getMarksForParticularStudent(ExamMarks $exam, $id){
        $collection = new ExamMarksResource(ExamMarks::find($id));
        return $collection;
    }

    protected function deleteMarksForStudent(ExamMarks $exam, $id){
        $exam->find($id)->delete();
    }

    protected function validateExam(){
        if(empty(request()->marks)){
            return redirect()->back()->withErrors("Please Attach Marks to continue");
        }else{
            return $this->createExam();
        }
    }
}
