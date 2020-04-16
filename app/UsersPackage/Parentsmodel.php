<?php

namespace App\UsersPackage;

use Illuminate\Database\Eloquent\Model;

class Parentsmodel extends Model
{
    protected $table = 'parents';
    
    protected $fillable = ['pfirst_name','plast_name','date_of_birth','image_path','RelationShip',
                            'District','Village','NIN','Telephone','user_id','created_by'];
    
    public function students(){
        return $this->hasMany('App\UsersPackage\Students');
    }
}
