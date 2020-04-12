<?php

namespace App\ActivitiesPackage;

use Illuminate\Database\Eloquent\Model;

class DutiesModel extends Model
{
    protected $table = "duties";
    protected $fillable = ['teacher_id','week','term_id','created_by'];
}
