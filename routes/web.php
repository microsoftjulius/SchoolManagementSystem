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

################## Subjects Module ################################################
Route::post('/create-subject','AccademicsPackage\SubjectsController@validateSubject');
Route::patch('/edit-subject/{id}','AccademicsPackage\SubjectsController@editSubject');
Route::get('/get-all-subjects','AccademicsPackage\SubjectsController@getAllSubjects');
Route::get('/get-single-subject/{id}','AccademicsPackage\SubjectsController@getSingleSubject');
Route::delete('/delete-subject/{id}','AccademicsPackage\SubjectsController@deleteSubject');

################# Exams Module ####################################################
Route::post('/create-exam-marks','AccademicsPackage\ExamsController@validateExam');
Route::patch('/update-exam-marks/{id}','AccademicsPackage\ExamsController@updateExam');
Route::get('/get-all-exam-marks-for-students','AccademicsPackage\ExamsController@getExamMarksForStudents');
Route::get('/get-single-exam-marks-for-one-student/{id}','AccademicsPackage\ExamsController@getMarksForParticularStudent');
Route::delete('/delete-single-exam-marks/{id}','AccademicsPackage\ExamsController@deleteMarksForStudent');

################### Past Papers Module ############################################
Route::post('/create-past-paper','AccademicsPackage\PastPapersController@validatePastPapers');
Route::patch('/update-past-paper/{id}','AccademicsPackage\PastPapersController@updatePastPapers');
Route::get('/get-all-past-papers','AccademicsPackage\PastPapersController@getAllPastPapers');
Route::get('/get-single-past-paper/{id}','AccademicsPackage\PastPapersController@getSinglePastPaper');
Route::get('/download-past-paper/{id}','AccademicsPackage\PastPapersController@downloadSinglePastPaper');
Route::delete('/delete-past-paper/{id}','AccademicsPackage\PastPapersController@deletePastPaper');

#################### Time Tables Module ############################################
Route::post('/create-time-table','AccademicsPackage\TimeTablesController@validateTimeTable');
Route::patch('/update-time-table/{id}','AccademicsPackage\TimeTablesController@updateTimeTable');
Route::get('/get-all-time-tables','AccademicsPackage\TimeTablesController@getAllTimeTables');
Route::get('/get-single-time-table/{id}','AccademicsPackage\TimeTablesController@getSingleTimeTable');
Route::get('/download-time-table/{id}','AccademicsPackage\TimeTablesController@downloadTimeTable');
Route::delete('/delete-time-table/{id}','AccademicsPackage\TimeTablesController@deleteTimeTable');

################### Terms Module #################################################
Route::post('/create-term','AccademicsPackage\TermsController@validateTerm');
Route::patch('/update-term/{id}','AccademicsPackage\TermsController@updateTerm');
Route::get('/get-all-terms','AccademicsPackage\TermsController@getAllTerms');
Route::get('/get-single-term/{id}','AccademicsPackage\TermsController@getSingleTerm');
Route::delete('/delete-single-term/{id}','AccademicsPackage\TermsController@deleteSingleTerm');

################### Home Works Module ############################################
Route::post('/create-home-work','AccademicsPackage\HomeWorksController@validateHomeWork');
Route::patch('/update-home-work/{id}','AccademicsPackage\HomeWorksController@updateHomeWork');
Route::get('/get-all-home-works','AccademicsPackage\HomeWorksController@getAllHomeWorks');
Route::get('/get-single-home-work/{id}','AccademicsPackage\HomeWorksController@getSingleHomeWork');
Route::get('/download-home-work/{id}','AccademicsPackage\HomeWorksController@downloadHomeWork');
Route::delete('/delete-home-work/{id}','AccademicsPackage\HomeWorksController@deleteHomeWork');

################### Feed Module ##################################################
Route::post('/make-fees-payment','AccountingPackage\FeesController@validateFeesPayment');
Route::patch('/edit-fees-payment/{id}','AccountingPackage\FeesController@updateFees');
Route::get('/get-all-fees-payments','AccountingPackage\FeesController@getAllFeesPayments');
Route::get('/get-fees-for-particular-student/{id}','AccountingPackage\FeesController@getFeesForOneStudent');

################## Co-Curricular activities #####################################
Route::post('/create-co-curricular-activity','ActivitiesPackage\CocuricularActivitiesController@validateActivities');
Route::patch('/update-co-curricular-activity/{id}','ActivitiesPackage\CocuricularActivitiesController@updateActivity');
Route::get('/get-all-activities','ActivitiesPackage\CocuricularActivitiesController@getAllActivities');
Route::delete('/delete-activity/{id}','ActivitiesPackage\CocuricularActivitiesController@deleteActivity');

##################### Duties Module ############################################
Route::post('/create-duty','ActivitiesPackage\DutiesController@validateDuty');
Route::patch('/edit-duty-information/{id}','ActivitiesPackage\DutiesController@updateDuty');
Route::get('/get-all-duties','ActivitiesPackage\DutiesController@getAllDuties');
Route::delete('/delete-duty-information/{id}','ActivitiesPackage\DutiesController@deleteDuty');

################## Public Days ################################################
Route::post('/create-public-day','ActivitiesPackage\PublicDaysController@validatePublicDay');
Route::patch('/update-public-day/{id}','ActivitiesPackage\PublicDaysController@updatePublicDay');
Route::get('/get-all-public-days','ActivitiesPackage\PublicDaysController@getAllPublicDays');
Route::delete('/delete-public-day/{id}','ActivitiesPackage\PublicDaysController@deletePublicDay');