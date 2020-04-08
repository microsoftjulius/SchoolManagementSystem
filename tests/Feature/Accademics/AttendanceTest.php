<?php

namespace Tests\Feature\Accademics;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\AccademicsModel\Attendance;
use Tests\TestCase;

class AttendanceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function markAttendance(){
        $this->withoutExceptionHandling();
        $response = $this->post('/mark-attendance',[
            'student_id'        => 1,
            'class_id'          => 1,
            'subject_id'        => 1,
            'teacher_id'        => 1,
            'attendance_status' => 'yes'
        ]);
        $this->assertDatabaseHas('attendances',['attendance_status'=>'yes']);
    }

    /** @test */
    public function removeAttendance(){
        $this->markAttendance();
        $attendance = Attendance::first();
        $response = $this->patch('/remove-attendance/'.$attendance->student_id);
        $this->assertDatabaseHas('attendances',['attendance_status'=>'no']);
    }

    /** @test */
    public function getAttendesAndAbsentees(){
        $this->markAttendance();
        $date = '2020-03-12 02:20:00';
        $response = $this->get('/get-daily-attendance-and-absentees/'.$date);
        $response->assertOk();
    }

     /** @test */
    public function getDailyAbsentees(){
        $this->markAttendance();
        $date = '2020-03-12 02:20:00';
        $response = $this->get('/get-daily-absentees/'.$date);
        $response->assertOk();
    }

    /** @test */
    public function getAllDailyAttendance(){
        $this->markAttendance();
        $date = '2020-03-12 02:20:00';
        $response = $this->get('/get-daily-attendance/'.$date);
        $response->assertOk();
    }
}
