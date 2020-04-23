<?php

namespace App\Http\Controllers\ClassesPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ClassesModels\ClassRooms as ClassRoomsModel;
use App\UsersPackage\Employeesmodel as Employee;
use App\ClassesModels\Streams as StreamsModel;
use App\Http\Resources\ClassesResources\ClassRooms as ClassesResource;

class ClassRooms extends Controller
{
    protected function createClassRoom(ClassRoomsModel $class_name){

        $teacher_id = Employee::where('efirst_name',explode(' ',request()->teacher_names)[0])
        ->where('elast_name',explode(' ',request()->teacher_names)[1])->value('id');
        if(empty($teacher_id)){ return redirect()->back()->withErrors("Please Select a Teacher from the list");}

        $stream_id = StreamsModel::where('stream_name',request()->stream_name)->value('id');
        if(empty($stream_id)){ return redirect()->back()->withErrors("Please Select a Stream from the list");}

        $class = new ClassRoomsModel();
        $class->class_name       = request()->class_name;
        $class->class_teacher_id = $teacher_id;
        $class->stream_id        = $stream_id;
        $class->fees_amount      = request()->fees_amount;
        $class->created_by       = request()->created_by;
        $class->save();

        return redirect()->back()->with('msg',"New Class Has Been Created Successfully");
    }

    protected function editClassRoomName(ClassRoomsModel $class_name, $id){
        $editClassRoom = $class_name->find($id)->update(array(
            'class_name' => 'Primary Two'
        ));
    }

    protected function getAllClassRooms(){
        $collection = ClassesResource::collection(ClassRoomsModel::all());
        $teachers   = Employee::all();
        $streams    = StreamsModel::all();
        return view('admin_pages.class_rooms',compact('collection','teachers','streams'));
    }

    protected function getParticularClassRoom($id){
        return new ClassesResource(ClassRoomsModel::find($id));
    }

    protected function deleteClassTemporarily(ClassRoomsModel $class_name, $id){
        $editClassRoom = $class_name->find($id)->update(array(
            'status' => 'removed'
        ));
    }

    protected function deleteClassParmanetly(ClassRoomsModel $class_name, $id){
        $class_name->find($id)->delete();
    }

    protected function validateClassRoomOnCreation(){
        if(empty(request()->teacher_names)){
            return redirect()->back()->withErrors("Please select a teacher to continue");
        }elseif(empty(request()->class_name)){
            return redirect()->back()->withErrors("Please select a class to continue");
        }elseif(empty(request()->stream_name)){
            return redirect()->back()->withErrors("Please select a stream to continue");
        }elseif(empty(request()->fees_amount)){
            return redirect()->back()->withErrors("Please add a fees amount to continue");
        }else{
            return $this->createClassRoom();
        }
    }
}
