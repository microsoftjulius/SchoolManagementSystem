<?php

namespace App\AccademicsModel;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $fillable = ['term','year','duration'];
}
