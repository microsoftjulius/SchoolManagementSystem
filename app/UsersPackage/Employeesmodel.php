<?php

namespace App\UsersPackage;

use Illuminate\Database\Eloquent\Model;

class Employeesmodel extends Model
{
    protected $table = 'employees';

    protected $fillable = ['first_name','last_name','date_of_birth','image_path','status',
                            'District','Village','NIN','Telephone','role_id','status','level_of_education','certificates'];
                            
    public function classRoom(){
        return $this->belongsToMany('App\ClassesModels\ClassRooms');
    }

    public function subject(){
        return $this->belongsToMany('App\AccademicsModel\Subjects');
    }
}
