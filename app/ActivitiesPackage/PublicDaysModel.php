<?php

namespace App\ActivitiesPackage;

use Illuminate\Database\Eloquent\Model;

class PublicDaysModel extends Model
{
    protected $table = "public_days";
    protected $fillable = ['public_day','date','created_by'];
}
