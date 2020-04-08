<?php

namespace App\AccademicsModel;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['student_id','class_id','subject_id','teacher_id','attendance_status'];

    public function student(){
        return $this->belongsTo('App\UsersPackage\Students');
    }

    public function classRoom(){
        return $this->belongsTo('App\ClassesModels\ClassRooms');
    }

    public function subjects(){
        return $this->belongsTo('App\Accademics\Subjects');
    }

    public function teachers(){
        return $this->belongsTo('App\UsersPackage\Employees');
    }

    
}
