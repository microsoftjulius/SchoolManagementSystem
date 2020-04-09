<?php

namespace App\AccademicsModel;

use Illuminate\Database\Eloquent\Model;

class ExamMarks extends Model
{
    protected $fillable = ['subject_id','student_id','marks','comment','created_by','class_id'];

    public function subjects(){
        return $this->belongsTo('App\AccademicsModel\Subject');
    }
    
    public function students(){
        return $this->belongsTo('App\UsersPackage\Students');
    }

    public function classRooms(){
        return $this->belongsTo('App\ClassesModels\ClassRooms');
    }
}
