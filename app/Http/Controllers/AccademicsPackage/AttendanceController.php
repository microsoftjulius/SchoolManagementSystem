<?php

namespace App\Http\Controllers\AccademicsPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AccademicsModel\Attendance;
use App\Http\Resources\AccademicsResource\AttendanceResource;

class AttendanceController extends Controller
{
    protected function markAttendance(){
        if(empty(request()->attendance_status)){
            $attendance_status = 'no';
        }else{ $attendance_status = 'yes'; }

        $attendance = new Attendance();
        $attendance->student_id = request()->student_id;
        $attendance->class_id   = request()->class_id;
        $attendance->subject_id = request()->subject_id;
        $attendance->teacher_id = request()->teacher_id;
        $attendance->attendance_status = $attendance_status;
        $attendance->save();
    }   

    protected function removeAttendance(Attendance $attendance, $students_id){
        $attendance->where('student_id',$students_id)->update(array('attendance_status'=>'no'));
    }

    protected function getDailyAttendance($date){
        return AttendanceResource::collection(Attendance::join('students','students.id','attendance.student_id')
        ->join('class_rooms','class_rooms.id','attendance.class_id')
        ->join('subjects','subjects.id','attendance.subject_id')
        ->join('employees','employees.id','attendance.teacher_id')
        ->where('attendance.created_at',$date)->where('attendance_status','yes')->get());
    }

    protected function getDailyAbsentees($date){
        return AttendanceResource::collection(Attendance::join('students','students.id','attendance.student_id')
        ->join('class_rooms','class_rooms.id','attendance.class_id')
        ->join('subjects','subjects.id','attendance.subject_id')
        ->join('employees','employees.id','attendance.teacher_id')
        ->where('attendance.created_at',$date)->where('attendance_status','no')->get());
    }

    protected function getDailyAtendeesAndAbsentees($date){
        return AttendanceResource::collection(Attendance::join('students','students.id','attendance.student_id')
        ->join('class_rooms','class_rooms.id','attendance.class_id')
        ->join('subjects','subjects.id','attendance.subject_id')
        ->join('employees','employees.id','attendance.teacher_id')
        ->where('attendance.created_at',$date)->get());
    }
}
