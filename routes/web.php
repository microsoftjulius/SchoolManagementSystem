<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
###################Streams Routes #############################################
Route::post('/create-stream','ClassesPackage\Streams@createClassStream');
Route::patch('/edit-stream-name/{id}','ClassesPackage\Streams@editStreamName');
Route::get('/get-all-streams','ClassesPackage\Streams@getAllStreams');
Route::patch('/delete-stream/{id}','ClassesPackage\Streams@deleteStreamTemporarily');
Route::delete('/parmanetly-delete-stream/{id}','ClassesPackage\Streams@deleteStreamParmanetly');

######################Class Rooms routes #######################################
Route::post('/create-class-room','ClassesPackage\ClassRooms@createClassRoom');
Route::patch('/edit-class-name/{id}','ClassesPackage\ClassRooms@editClassRoomName');
Route::get('/get-all-class-rooms','ClassesPackage\ClassRooms@getAllClassRooms');
Route::patch('/delete-class/{id}','ClassesPackage\ClassRooms@deleteClassTemporarily');
Route::delete('/parmanetly-delete-class/{id}','ClassesPackage\ClassRooms@deleteClassParmanetly');

#######################General Person #########################################
Route::post('/create-person','UsersPackage\GeneralPerson@createPerson');
Route::patch('/edit-person/{id}','UsersPackage\GeneralPerson@editPerson');
Route::patch('/suspend-person/{id}','UsersPackage\GeneralPerson@suspendPerson');
Route::patch('/expel-person/{id}','UsersPackage\GeneralPerson@expelPerson');

####################Students #################################################
Route::post('/create-student','UsersPackage\Students@validateStudent');
Route::patch('/edit-student/{id}','UsersPackage\Students@editStudent');
Route::get('/get-all-students','UsersPackage\Students@getAllStudents');
Route::patch('/suspend-student/{id}','UsersPackage\Students@suspendStudent');
Route::patch('/expel-student/{id}','UsersPackage\Students@expellStudent');

###################Parents####################################################
Route::post('/create-parent','UsersPackage\ParentsController@validateParent');
Route::patch('/edit-parent/{id}','UsersPackage\ParentsController@editParent');
Route::get('/get-all-parents','UsersPackage\ParentsController@getAllParents');
