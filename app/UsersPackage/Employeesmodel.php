<?php

namespace App\UsersPackage;

use Illuminate\Database\Eloquent\Model;

class Employeesmodel extends Model
{
    protected $table = 'employees';

    protected $fillable = ['efirst_name','elast_name','date_of_birth','image_path','status','created_by',
                            'District','Village','NIN','Telephone','role_id','status','level_of_education','certificates'];
                            
    public function classRoom(){
        return $this->belongsToMany('App\ClassesModels\ClassRooms');
    }

    public function subject(){
        return $this->hasMany('App\AccademicsModel\Subjects');
    }

    public function message(){
        return $this->hasMany('App\MessagesPackage\MessagesModel');
    }

    public function user(){
        return $this->belongsTo('App\User', 'created_by');
    }

    public function attendaces(){
        return $this->hasMany('App\AccademicsModel\Attendance');
    }
}
