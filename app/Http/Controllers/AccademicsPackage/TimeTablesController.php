<?php

namespace App\Http\Controllers\AccademicsPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AccademicsModel\TimeTables;
use App\ClassesModels\ClassRooms;
use App\Http\Resources\AccademicsResource\TimeTablesResource;

class TimeTablesController extends Controller
{
    public function __construct(){
        $this->time_table_path = request()->time_table;
    }
    protected function createTimeTable(){
        $class_id = ClassRooms::where('class_name',request()->class_name)->value('id');
        $time_table = request()->time_table;
        $time_table_path = $time_table->getClientOriginalName();
        $time_table->move('time_tables/',$time_table_path);

        $time_tables = new TimeTables();

        $time_tables->class_id = $class_id;
        $time_tables->created_by = 1;
        $time_tables->time_table = $time_table_path;
        $time_tables->save();
        return redirect()->back()->with('msg',"New time table has been created successfully");
    }

    protected function updateTimeTable(TimeTables $time_table, $id){
        $time_table->find($id)->update(array(
            'class_id'   => 2,
            'created_by' => 1,
            'time_table' => $this->time_table_path
        ));
    }

    protected function getAllTimeTables(){
        $collection = TimeTablesResource::collection(TimeTables::all());
        $class_rooms = ClassRooms::get();
        return view('admin_pages.time_tables',compact('collection','class_rooms'));
    }

    protected function getSingleTimeTable($id){
        return new TimeTablesResource(TimeTables::find($id));
    }

    protected function downloadTimeTable(TimeTables $time_table, $id){
        $file_name = $time_table->find($id)->value('time_table');
        $file = public_path(). "/time_tables/$file_name";
        if(file_exists($file)){
            return response()->download($file);;
        }else{
            return redirect()->back()->withErrors("File was not found. Please contacts the person responsible to add the file. Sorry for any inconviniencies caused");
        }
    }

    protected function deleteTimeTable(TimeTables $time_table, $id){
        $time_table->find($id)->delete();
        return redirect()->back()->with('msg',"A Time Table has been deleted successfully");
    }
    protected function validateTimeTable(){
        if(empty(request()->time_table)){
            return redirect()->back()->withErrors("Please attach a time table");
        }if(empty(request()->class_name)){ 
            return redirect()->back()->withErrors("Please select an existing class or go to classes and create a new class");
        }
        else{
            return $this->createTimeTable();
        }
    }
}
