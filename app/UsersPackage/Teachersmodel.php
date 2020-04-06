<?php

namespace App\UsersPackage;

use Illuminate\Database\Eloquent\Model;

class Teachersmodel extends Model
{
    protected $table = 'teachers';

    protected $fillable = ['first_name','last_name','date_of_birth','image_path','status',
                            'District','Village','NIN','Telephone','role_id','status'];
                            
    public function classRoom(){
        return $this->belongsToMany('App\ClassesModels\ClassRooms');
    }
}
