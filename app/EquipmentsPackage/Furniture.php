<?php

namespace App\EquipmentsPackage;

use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    protected $fillable = ['furniture_name','number_bought','created_by'];

    public function user(){
        return $this->belongsTo('App\User', 'created_by');
    }
    
}
