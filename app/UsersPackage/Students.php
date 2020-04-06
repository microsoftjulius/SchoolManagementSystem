<?php

namespace App\UsersPackage;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = ['first_name','last_name','date_of_birth','image_path','guardian_id','class_id','status','user_id','created_by'];

    public function parentt(){
        return $this->belongsTo('App\UsersPackage\ParentsModel');
    }
}
