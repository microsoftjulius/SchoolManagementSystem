<?php

namespace Tests\Feature\Accademics;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\AccademicsModel\TimeTables;
use Tests\TestCase;

class TimeTablesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createTimeTable(){
        $this->withoutExceptionHandling();
        $response = $this->post('/create-time-table',[
            'class_id'   => 1,
            'created_by' => 1,
            'time_table' => 'path_to_time_table'
        ]);
        $this->assertDatabaseHas('time_tables',['class_id'=>1]);
    }

    /** @test */
    public function editTimeTable(){
        $this->createTimeTable();
        $timetable = TimeTables::first();
        $response = $this->patch('/update-time-table/'.$timetable->id,[
            'class_id'   => 2,
            'created_by' => 1,
            'time_table' => 'path_to_time_table2'
        ]);
        $this->assertEquals('path_to_time_table2',TimeTables::first()->time_table);
    }

    /** @test */
    public function getAllTimeTables(){
        $this->createTimeTable();
        $response = $this->get('/get-all-time-tables');
        $response->assertOk();
    }

    /** @test */
    public function getSingleTimeTable(){
        $this->createTimeTable();
        $timetable = TimeTables::first();
        $response = $this->get('/get-single-time-table/'.$timetable->id);
        $response->assertOk();
    }

    /** @test */
    public function downloadTimeTable(){
        $this->createTimeTable();
        $timetable = TimeTables::first();
        $response = $this->get('/download-time-table/'.$timetable->id);
        $response->assertStatus(302);
    }

    /** @test */
    public function deleteTimeTable(){
        $this->createTimeTable();
        $timetable = TimeTables::first();
        $response = $this->delete('/delete-time-table/'.$timetable->id);
        $this->assertCount(0, TimeTables::all());
    }
}
