<?php

namespace App\ClassesModels;

use Illuminate\Database\Eloquent\Model;

class ClassRooms extends Model
{
    protected $fillable = ['class_name','class_teacher_id','students_id','stream_id','status','fees_amount'];

    public function streams(){
        return $this->belongsTo('App\ClassesModels\Streams','stream_id');
    }

    public function students(){
        return $this->hasMany('App\UsersPackage\Students');
    }

    public function teachers(){
        return $this->belongsToMany('App\UsersPackage\TeachersModel');
    }

    public function timeTables(){
        return $this->hasOne('App\AccademicsModel\TimeTables');
    }

    public function users(){
        return $this->belongsTo('App\User', 'created_by');
    }

    public function attendaces(){
        return $this->hasMany('App\AccademicsModel\Attendance');
    }

    public function examMarks(){
        return $this->hasMany('App\AccademicsModel\ExamMarks');
    }

    public function pastPapers(){
        return $this->hasMany('App\AccademicsModel\PastPapers');
    }

    public function homeWorks(){
        return $this->hasMany('App\AccademicsModel\HomeWork');
    }
}
