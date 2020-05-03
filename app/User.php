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

    public function students(){
        return $this->hasMany('App\UsersPackage\Students');
    }

    public function personalGroups(){
        return $this->hasMany('App\UsersPackage\PersonalGroups');
    }

    public function messages(){
        return $this->hasMany('App\MessagesPackage\MessagesModel');
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

    public function furniture(){
        return $this->hasMany('App\EquipmentsPackage\Furniture');
    }

    public function requirement(){
        return $this->hasMany('App\EquipmentsPackage\Requirement');
    }

    public function subjects(){
        return $this->hasMany('App\AccademicsModel\Subject');
    }

    public function getMessagesAccountBalance(){
        if(!$sock = @fsockopen('www.google.com', 80))
        {
            return null;
        }
        else
        {
            $url = "http://www.egosms.co/api/v1/plain/?method=Balance&username=microsoft&password=123456";
            return file_get_contents($url);
        }
    }

    public function getTotalSmsLeft(){
        $number_of_sms = $this->getMessagesAccountBalance()/33.3;
        if(!$sock = @fsockopen('www.google.com', 80))
        {
            return null;
        }
        else
        {
            return floor($number_of_sms);
        }
    }
}
