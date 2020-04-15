<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            array(
                'name'=>'Julius Ssemakula',
                'email'=>'julisema4@gmail.com',
                'password'=>Hash::make('123Jane14.'),
        ),
            array(
                'name'=>'Joseph Katende',
                'email'=>'julisema4@goproug.com',
                'password'=>Hash::make('123Jane14.'),               
            ),
            array(
                'name'=>'James Ociba',
                'email'=>'ocibajames@gmail.com',
                'password'=>Hash::make('123Jane14.'), 
            )
        ));
    }
}
