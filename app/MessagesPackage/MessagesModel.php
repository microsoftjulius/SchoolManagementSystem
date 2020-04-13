<?php

namespace App\MessagesPackage;

use Illuminate\Database\Eloquent\Model;

class MessagesModel extends Model
{
    protected $table = "messages";

    protected $fillable = ['message','date_of_sending','recievers_group','senders_id','status'];

    public function employees(){
        return $this->belongsTo('App\UsersPackage\Employeesmodel');
    }
}
