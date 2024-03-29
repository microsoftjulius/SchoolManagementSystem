<?php

namespace App\Http\Controllers\ClassesPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ClassesModels\Streams as StreamsModel;
use App\Http\Resources\ClassesResources\Streams as StreamsResource;

class Streams extends Controller
{
    protected function createClassStream(StreamsModel $stream){
        if(StreamsModel::where('stream_name', request()->stream_name)->exists()){
            return redirect()->back()->withErrors("stream name already Exists");
        }else{
            $stream->create($this->validateStreamOnCreation());
        }
        return redirect()->back()->with('msg',"New stream has been created successfully");
    }

    protected function editStreamName(StreamsModel $stream, $id){
        $editStream = $stream->find($id)->update(array(
            'stream_name' => request()->stream_name
        )); 
    }

    protected function getAllStreams(){
        $collection = StreamsResource::collection(StreamsModel::where('status','!=','removed')->get());
        return view('admin_pages.streams',compact('collection'));
    }

    protected function getParticularStream($id){
        return new StreamsResource(StreamsModel::find($id));
    }

    protected function deleteStreamTemporarily(StreamsModel $stream, $id){
        $editStream = $stream->find($id)->update(array(
            'status' => 'removed'
        )); 
        return redirect()->back()->with('msg',"A stream has been deleted successfully");
    }

    protected function deleteStreamParmanetly(StreamsModel $stream, $id){
        $stream->find($id)->delete();
    }

    protected function validateStreamOnCreation(){
        return request()->validate([
            'stream_name'        => 'required',
            'created_by'         => 'required',
            'status'             => ''
        ]);
    }
}
