<?php

namespace App\Http\Controllers\UsersPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\UsersPackage\Parentsmodel;
use App\User;

class RegistrationController extends Controller
{
    public function __construct(){
        $this->person = new GeneralPerson();
    }

    public function registerUser(){
        $user = new User();
        $user->name     = $this->person->getFirstName() . " " . $this->person->getLastname();
        $user->email    = $this->person->getFirstName() . $this->person->getTelephoneNumber();
        $user->password = Hash::make($this->person->getTelephoneNumber());
        $user->save();
    }
}
