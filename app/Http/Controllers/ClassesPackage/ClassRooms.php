<?php

namespace App\Http\Controllers\ClassesPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ClassesModels\ClassRooms as ClassRoomsModel;
use App\Http\Resources\ClassesResources\ClassRooms as ClassesResource;

class ClassRooms extends Controller
{
    protected function createClassRoom(ClassRoomsModel $class_name){
        return $class_name->create($this->validateClassRoomOnCreation());
    }

    protected function editClassRoomName(ClassRoomsModel $class_name, $id){
        $editClassRoom = $class_name->find($id)->update(array(
            'class_name' => 'Primary Two'
        ));
    }

    protected function getAllClassRooms(){
        return ClassesResource::collection(ClassRoomsModel::all());
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
        return request()->validate([
            'class_name'        => 'required',
            'class_teacher_id'  => 'required',
            'students_id'       => 'required',
            'stream_id'         => 'required',
            'status'            => ''
        ]);
    }
}
