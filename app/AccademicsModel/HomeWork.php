<?php

namespace App\AccademicsModel;

use Illuminate\Database\Eloquent\Model;

class HomeWork extends Model
{
    protected $fillable = ['year','class_id','subject_id','created_by','paper_path'];

    public function subjects(){
        return $this->belongsTo('App\AccademicsModel\Subject');
    }

    public function classRooms(){
        return $this->belongsTo('App\ClassesModels\ClassRooms');
    }
}
