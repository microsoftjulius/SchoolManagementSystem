<?php

namespace App\Http\Controllers\AccademicsPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AccademicsModel\Subject;
use App\UsersPackage\Employeesmodel as Employee;
use App\Http\Resources\AccademicsResource\SubjectsResource;

class SubjectsController extends Controller
{
    protected function createSubject(){
        
        $teacher_id = Employee::where('efirst_name',explode(' ',request()->teacher_name)[0])
        ->where('elast_name',explode(' ',request()->teacher_name)[1])->value('id');

        if(Subject::where('subject_code',request()->subject_code)->exists()){
            return redirect()->back()->withErrors("The Subject is already registered");
        }
        $subject = new Subject();
        $subject->subject_name = request()->subject_name;
        $subject->subject_code = request()->subject_code;
        $subject->teacher_id   = $teacher_id;
        $subject->created_by   = request()->created_by;
        $subject->save();
        return redirect()->back()->with('msg',"New subject has been created successfully");
    }

    protected function editSubject(Subject $subject, $id){
        $subject->find($id)->update(array(
            'subject_code' => 'UI782Ps'
        ));
    }

    protected function getAllSubjects(){
        $collection = SubjectsResource::collection(Subject::all());

        $teachers = Employee::all();
        return view('admin_pages.subjects',compact('collection','teachers'));
    }

    protected function getSingleSubject($id){
        return new SubjectsResource(Subject::find($id));
    }

    protected function deleteSubject(Subject $subject, $id){
        $subject->find($id)->delete();
    }

    protected function validateSubject(){
        if(empty(request()->subject_name)){
            return redirect()->back()->withErrors("Please add a subject name");
        }
        if(empty(request()->subject_code)){
            return redirect()->back()->withErrors("Please Add a subject code");
        }
        else{
            return $this->createSubject();
        }
    }
}
