<?php

namespace App\ActivitiesPackage;

use Illuminate\Database\Eloquent\Model;

class CocuricularActivitesModel extends Model
{
    protected $table = "cocuricular_activites";
    protected $fillable = ['activity','date','created_by'];
}
