<?php

namespace App\ClassesModels;

use Illuminate\Database\Eloquent\Model;

class ClassRooms extends Model
{
    protected $fillable = ['class_name','class_teacher_id','students_id','stream_id','status','fees_amount'];

    public function streams(){
        return $this->hasMany('App\ClassesModels\Streams');
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
}
