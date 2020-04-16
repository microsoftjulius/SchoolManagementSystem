<?php

namespace App\AccademicsModel;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['subject_name','subject_code','teacher_id','created_by'];

    public function teachers(){
        return $this->belongsTo('App\UsersPackage\Employeesmodel', 'teacher_id');
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
