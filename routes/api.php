<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::patch('/edit-stream-name/{id}','ClassesPackage\Streams@editStreamName');
Route::post('/create-stream','ClassesPackage\Streams@createClassStream');
Route::post('/create-furniture','EquipmentsPackage\FurnitureController@validateFurniture');
Route::post('/create-requirement','EquipmentsPackage\RequirementsController@validateRequirement');
