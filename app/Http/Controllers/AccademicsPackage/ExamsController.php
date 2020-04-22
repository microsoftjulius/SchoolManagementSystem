<?php

namespace App\Http\Controllers\AccademicsPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AccademicsModel\ExamMarks;
use App\UsersPackage\Students as Student;
use App\AccademicsModel\Subject;
use App\ClassesModels\ClassRooms as ClassRoomsModel;
use App\Http\Resources\AccademicsResource\ExamMarksResource;

class ExamsController extends Controller
{
    protected function createExam(){

        $class_id = ClassRoomsModel::where('class_name',request()->class_name)->value('id');
        if(empty($class_id)){ 
            return redirect()->back()->withErrors('Please select a Class to continue');}

        $student_id = Student::where('sfirst_name',explode(' ',request()->student_name)[0])
        ->where('slast_name', explode(' ',request()->student_name)[1])->value('id');
        if(empty($student_id)){ return redirect()->back()->withErrors('Please select a Class to continue');}

        $subject_id = Subject::where('subject_name',request()->subject_name)->value('id');
        if(empty($subject_id)){ return redirect()->back()->withErrors('Please select a Class to continue');}

        if(ExamMarks::where('student_id', $student_id)->where('subject_id', $subject_id)
        ->where('class_id', $class_id)->exists()){
            return redirect()->back()->withErrors("Student already has marks for this subject");
        }
        $exam = new ExamMarks();
        $exam->subject_id = $subject_id;
        $exam->student_id = $student_id;
        $exam->marks      = request()->marks;
        $exam->comment    = request()->comment;
        $exam->created_by = request()->created_by;
        $exam->class_id   = $class_id;
        $exam->save();
        return redirect()->back()->with('msg',"Marks have been added successfully");
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
        $students = Student::all();
        $subjects = Subject::all();
        $class_rooms = ClassRoomsModel::all();
        return view('admin_pages.exams',compact('collection','students','subjects','class_rooms'));
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
