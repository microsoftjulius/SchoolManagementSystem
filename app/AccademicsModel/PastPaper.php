<?php

namespace App\AccademicsModel;

use Illuminate\Database\Eloquent\Model;

class PastPaper extends Model
{
    protected $fillable = ['year','class_id','subject_id','created_by','paper_path'];
}
