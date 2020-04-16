<?php

namespace App\UsersPackage;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = ['sfirst_name','slast_name','date_of_birth','image_path','guardian_id','status','user_id','created_by','former_school'];

    public function guardian(){
        return $this->belongsTo('App\UsersPackage\ParentsModel');
    }

    public function fees(){
        return $this->hasMany('App\AccountingsModel\Fees');
    }

    public function classRooms(){
        return $this->hasOne('App\ClassesModels\ClassRooms');
    }

    public function attendaces(){
        return $this->hasMany('App\AccademicsModel\Attendance');
    }

    public function examMarks(){
        return $this->hasMany('App\AccademicsModel\ExamMarks');
    }
}
