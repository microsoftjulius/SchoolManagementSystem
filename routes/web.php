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
Route::get('/get-particular-stream/{id}','ClassesPackage\Streams@getParticularStream');

######################Class Rooms routes #######################################
Route::post('/create-class-room','ClassesPackage\ClassRooms@createClassRoom');
Route::patch('/edit-class-name/{id}','ClassesPackage\ClassRooms@editClassRoomName');
Route::get('/get-all-class-rooms','ClassesPackage\ClassRooms@getAllClassRooms');
Route::patch('/delete-class/{id}','ClassesPackage\ClassRooms@deleteClassTemporarily');
Route::delete('/parmanetly-delete-class/{id}','ClassesPackage\ClassRooms@deleteClassParmanetly');
Route::get('/get-particular-class-room/{id}','ClassesPackage\ClassRooms@getParticularClassRoom');

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
Route::get('/get-particular-student/{id}','UsersPackage\Students@getIndividualStudent');

###################Parents####################################################
Route::post('/create-parent','UsersPackage\ParentsController@validateParent');
Route::patch('/edit-parent/{id}','UsersPackage\ParentsController@editParent');
Route::get('/get-all-parents','UsersPackage\ParentsController@getAllParents');
Route::get('/get-particular-parent/{id}','UsersPackage\ParentsController@getIndividualParent');

##################Employees ###################################################
Route::post('/create-employee','UsersPackage\EmployeesController@validateEmployee');
Route::patch('/edit-employee/{id}','UsersPackage\EmployeesController@editEmployee');
Route::get('/get-all-employees','UsersPackage\EmployeesController@getAllEmployees');
Route::patch('/suspend-employee/{id}','UsersPackage\EmployeesController@suspendEmployee');
Route::patch('/expel-employee/{id}','UsersPackage\EmployeesController@expelEmployee');
Route::patch('/assign-role-to-employee/{id}','UsersPackage\EmployeesController@assignRole');
Route::get('/get-particular-employee/{id}','UsersPackage\EmployeesController@getIndividualEmployee');

###############Attendance #######################################################
Route::post('/mark-attendance','AccademicsPackage\AttendanceController@markAttendance');
Route::patch('/remove-attendance/{students_id}','AccademicsPackage\AttendanceController@removeAttendance');
Route::get('/get-daily-attendance/{date}','AccademicsPackage\AttendanceController@getDailyAttendance');
Route::get('/get-daily-absentees/{date}','AccademicsPackage\AttendanceController@getDailyAbsentees');
Route::get('/get-daily-attendance-and-absentees/{date}','AccademicsPackage\AttendanceController@getDailyAtendeesAndAbsentees');
