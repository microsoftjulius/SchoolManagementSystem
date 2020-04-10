<?php

namespace App\AccountingsModel;

use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    protected $fillable = ['student_id','term_id','amount','created_by'];

    public function students(){
        return $this->belongsTo('App\UserPackage\Students');
    }

    public function term(){
        return $this->belongsTo('App\AccademicsModel\Term');
    }

    public function userCreating(){
        return $this->belongsTo('App\User');
    }
}
