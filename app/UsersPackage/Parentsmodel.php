<?php

namespace App\UsersPackage;

use Illuminate\Database\Eloquent\Model;

class Parentsmodel extends Model
{
    protected $table = 'parents';
    
    protected $fillable = ['first_name','last_name','date_of_birth','image_path','status','RelationShip',
                            'District','Village','NIN','Telephone'];
    
    public function students(){
        return $this->belongsTo('App\UsersPackage\Students');
    }
}
