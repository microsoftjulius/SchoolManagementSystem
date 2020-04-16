<?php

namespace App\AccountingsModel;

use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    protected $fillable = ['student_id','term_id','amount','created_by'];

    public function student(){
        return $this->belongsTo('App\UsersPackage\Students');
    }

    public function term(){
        return $this->belongsTo('App\AccademicsModel\Term');
    }

    //We use singilar funcitons.
    public function user(){
        return $this->belongsTo('App\User', 'created_by');
    }
}
