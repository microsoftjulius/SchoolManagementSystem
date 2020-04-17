<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonGroups extends Model
{
    protected $fillable = ['group_name'];

    public function messages(){
        return $this->belongsTo('App\MessagesPackage\MessagesModel');
    }
}
