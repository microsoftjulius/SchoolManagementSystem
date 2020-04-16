<?php

namespace App\ActivitiesPackage;

use Illuminate\Database\Eloquent\Model;

class DutiesModel extends Model
{
    protected $table = "duties";
    protected $fillable = ['teacher_id','week','term_id','created_by'];

    public function teacher(){
        return $this->belongsTo('App\UsersPackage\Employeesmodel', 'teacher_id');
    }

    public function term(){
        return $this->belongsTo('App\AccademicsModel\Term', 'term_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'created_by');
    }
}
