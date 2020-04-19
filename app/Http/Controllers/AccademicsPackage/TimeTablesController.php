<?php

namespace App\Http\Controllers\AccademicsPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AccademicsModel\TimeTables;
use App\Http\Resources\AccademicsResource\TimeTablesResource;

class TimeTablesController extends Controller
{
    public function __construct(){
        $this->time_table_path = request()->time_table;
    }

    protected function createTimeTable(){
        $time_tables = new TimeTables();

        $time_tables->class_id = request()->class_id;
        $time_tables->created_by = 1;
        $time_tables->time_table = $this->time_table_path;
        $time_tables->save();
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

        return view('admin_pages.time_tables',compact('collection'));
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
    }
    protected function validateTimeTable(){
        if(empty(request()->time_table)){
            return redirect()->back()->withErrors("Please attach a time table");
        }
        else{
            return $this->createTimeTable();
        }
    }
}
