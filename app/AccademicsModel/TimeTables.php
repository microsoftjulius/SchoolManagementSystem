<?php

namespace App\AccademicsModel;

use Illuminate\Database\Eloquent\Model;

class TimeTables extends Model
{
    protected $fillable = ['class_id','created_by','time_table'];

    public function classroom(){
        return $this->belongsTo('App\ClassesModels\ClassRooms', 'class_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'created_by');
    }
}
