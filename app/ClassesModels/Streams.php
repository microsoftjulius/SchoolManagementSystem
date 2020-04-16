<?php

namespace App\ClassesModels;

use Illuminate\Database\Eloquent\Model;

class Streams extends Model
{
    protected $fillable = ['stream_name','created_by','status'];

    public function classRoom(){
        return $this->hasMany('App\ClassesModels\ClassRooms');
    }

    public function users(){
        return $this->belongsTo('App\User', 'created_by');
    }
}
