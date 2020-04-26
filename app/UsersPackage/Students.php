<?php

namespace App\UsersPackage;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = ['sfirst_name','slast_name','date_of_birth','image_path','guardian_id','status','created_by','former_school','student_id','class_id','gender'];

    public function guardian(){
        return $this->belongsTo('App\UsersPackage\ParentsModel');
    }

    public function user(){
        return $this->belongsTo('App\User', 'created_by');
    }


    public function fees(){
        return $this->hasMany('App\AccountingsModel\Fees');
    }

    public function classRooms(){
        return $this->belongsTo('App\ClassesModels\ClassRooms', 'class_id');
    }

    public function attendaces(){
        return $this->hasMany('App\AccademicsModel\Attendance');
    }

    public function examMarks(){
        return $this->hasMany('App\AccademicsModel\ExamMarks');
    }

    public function requirements(){
        return $this->hasMany('App\EquipmentsPackage\Requirement');
    }
}
