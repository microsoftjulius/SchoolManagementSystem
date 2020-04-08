<?php

namespace App\AccademicsModel;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['subject_name','subject_code','teacher_id','created_by'];

    public function teachers(){
        return $this->belongsTo('App\UsersPackage\Employeesmodel');
    }
}
