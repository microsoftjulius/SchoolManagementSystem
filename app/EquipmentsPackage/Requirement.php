<?php

namespace App\EquipmentsPackage;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $fillable = ['requirement_name','number_bought','created_by','student_id'];

    public function user(){
        return $this->belongsTo('App\User', 'created_by');
    }

    public function student(){
        return $this->belongsTo('App\UsersPackage\Students', 'student_id');
    }
}
