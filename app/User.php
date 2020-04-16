<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function fees(){
        return $this->hasMany('App\AccountingsModel\Fees');
    }

    public function stream(){
        return $this->hasMany('App\ClassesModels\Streams');
    }

    public function classRooms(){
        return $this->hasMany('App\ClassesModels\ClassRooms');
    }

    public function guardians(){
        return $this->hasMany('App\UsersPackage\Parents');
    }

    public function employees(){
        return $this->hasMany('App\UsersPackage\Employeesmodel');
    }

    public function examMarks(){
        return $this->hasMany('App\AccademicsModel\ExamMarks');
    }

    public function pastPapers(){
        return $this->hasMany('App\AccademicsModel\PastPapers');
    }

    public function timeTables(){
        return $this->hasMany('App\AccademicsModel\TimeTables');
    }
    
    public function coCurricularActivities(){
        return $this->hasMany('App\ActivitiesPackage\CocuricularActivitesModel');
    }

    public function publicDays(){
        return $this->hasMany('App\ActivitiesPackage\PublicDaysModel');
    }
}
