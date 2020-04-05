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
