<?php

namespace App\ClassesModels;

use Illuminate\Database\Eloquent\Model;

class Streams extends Model
{
    protected $fillable = ['stream_name','created_by','status'];

    public function classRooms(){
        return $this->belongsTo('App\ClassesModels\ClassRooms');
    }
}
