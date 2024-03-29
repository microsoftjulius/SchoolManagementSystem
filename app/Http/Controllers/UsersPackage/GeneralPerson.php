<?php

namespace App\Http\Controllers\UsersPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsersPackage\GeneralPerson as Person;

class GeneralPerson extends Controller
{
    public function getFirstName(){
        return request()->first_name;
    }

    public function getLastname(){
        return request()->last_name;
    }

    public function getDateOfBirth(){
        return request()->date_of_birth;
    }

    public function getUserPhoto(){
        return request()->image;
    }

    public function getRelationShip(){
        return request()->RelationShip;
    }

    public function getDistrict(){
        return request()->District;
    }

    public function getVillage(){
        return request()->Village;
    }

    public function getNationalIdentificationNumber(){
        return request()->NIN;
    }

    public function getTelephoneNumber(){
        return request()->Telephone;
    }
}
