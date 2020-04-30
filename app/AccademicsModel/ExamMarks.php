<?php

namespace App\AccademicsModel;

use Illuminate\Database\Eloquent\Model;

class ExamMarks extends Model
{
    protected $fillable = ['subject_id','student_id','marks','comment','created_by','class_id','term_id'];

    public function subjects(){
        return $this->belongsTo('App\AccademicsModel\Subject', 'subject_id');
    }
    
    public function students(){
        return $this->belongsTo('App\UsersPackage\Students', 'student_id');
    }

    public function users(){
        return $this->belongsTo('App\User', 'created_by');
    }

    public function classRooms(){
        return $this->belongsTo('App\ClassesModels\ClassRooms', 'class_id');
    }
}
