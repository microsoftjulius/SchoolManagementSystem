<?php

namespace App\AccademicsModel;

use Illuminate\Database\Eloquent\Model;

class PastPaper extends Model
{
    protected $fillable = ['year','class_id','subject_id','created_by','paper_path'];

    public function classRoom(){
        return $this->belongsTo('App\ClassesModels\ClassRooms', 'class_id');
    }

    public function subject(){
        return $this->belongsTo('App\AccademicsModel\Subject', 'subject_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'created_by');
    }
}
