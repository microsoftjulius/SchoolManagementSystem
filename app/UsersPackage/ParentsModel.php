<?php

namespace App\UsersPackage;

use Illuminate\Database\Eloquent\Model;

class ParentsModel extends Model
{
    protected $table = 'parents';
    
    protected $fillable = ['pfirst_name','plast_name','date_of_birth','image_path','RelationShip',
                            'District','Village','NIN','Telephone','created_by'];
    
    public function student(){
        return $this->hasMany('App\UsersPackage\Students');
    }

    public function user(){
        return $this->belongsTo('App\User', 'created_by');
    }
}
