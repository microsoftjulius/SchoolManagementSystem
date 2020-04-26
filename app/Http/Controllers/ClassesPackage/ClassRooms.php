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
        $stream_id = StreamsModel::where('stream_name',request()->stream_name)->value('id');
        if(empty($stream_id)){ $stream_id = null; }

        $class = new ClassRoomsModel();
        $class->class_name       = request()->class_name;
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
        $collection = ClassesResource::collection(ClassRoomsModel::where('status','!=','removed')->get());
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
        return redirect()->back()->with('msg',"A class room has been deleted successfully");
    }

    protected function deleteClassParmanetly(ClassRoomsModel $class_name, $id){
        $class_name->find($id)->delete();
    }

    protected function validateClassRoomOnCreation(){
        if(empty(request()->class_name)){
            return redirect()->back()->withErrors("Please select a class to continue");
        }elseif(empty(request()->fees_amount)){
            return redirect()->back()->withErrors("Please add a fees amount to continue");
        }else{
            return $this->createClassRoom();
        }
    }
}
