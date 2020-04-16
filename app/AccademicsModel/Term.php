<?php

namespace App\AccademicsModel;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $fillable = ['term','year','duration'];

    public function fees(){
        return $this->hasMany('App\AccountinsModel\Fees');
    }

    public function duties(){
        return $this->hasMany('App\ActivitiesPackage\DutiesModel');
    }
}
