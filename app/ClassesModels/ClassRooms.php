<?php

namespace App\ClassesModels;

use Illuminate\Database\Eloquent\Model;

class ClassRooms extends Model
{
    protected $fillable = ['class_name','class_teacher_id','students_id','stream_id','status'];

    public function streams(){
        return $this->hasMany('App\ClassesModels\Streams');
    }
}
