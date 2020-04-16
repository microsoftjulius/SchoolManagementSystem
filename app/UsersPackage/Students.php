<?php

namespace App\UsersPackage;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = ['sfirst_name','slast_name','date_of_birth','image_path','guardian_id','status','user_id','created_by','former_school'];

    public function parentt(){
        return $this->belongsTo('App\UsersPackage\ParentsModel');
    }
}
