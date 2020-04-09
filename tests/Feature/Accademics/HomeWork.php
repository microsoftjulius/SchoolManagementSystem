<?php

namespace Tests\Feature\Accademics;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeWork extends TestCase
{
    use RefreshDatabase;

     /** @test */
    public function createHomeWork(){
        $this->withoutExceptionHandling();
        $response = $this->post('/create-home-work',[
            'year'       => 2018,
            'class_id'   => 1,
            'subject_id' => 1,
            'created_by' => 1,
            'paper_path' => 'path_to_past_paper'
        ]);
        $this->assertDatabaseHas('past_papers',['year'=>2018]);
    }

    /** @test */
    public function editHomeWork(){
        $this->createHomeWork();
        $response = $this->patch('/update-home-work',[
            'year'       => 2019,
            'class_id'   => 1,
            'subject_id' => 1,
            'created_by' => 1,
            'paper_path' => 'path_to_past_paper'
        ]);
        $this->assertEquals('2019', HomeWork::first()->year);
    }

    /** @test */
    public function getAllHomeWork(){
        $this->createHomeWork();
        $response = $this->get('/get-all-home-works');
        $response->assertOk();
    }

    /** @test */
    public function getSingleHomeWork(){
        $this->createHomeWork();
        $home_work = HomeWork::first();
        $response = $this->get('/get-single-home-work/'.$home_work->id);
        $response->assertOk();
    }

    /** @test */
    public function downloadHomeWork(){
        $this->createHomeWork();
        $home_work -> HomeWork::first();
        $response = $this->get('/download-home-work/'.$home_work->id);
        $response->assertOk();
    }

    /** @test */
    public function deleteHomeWork(){
        $this->createHomeWork();
        $home_work = HomeWork::first();
        $response = $this->delete('/delete-home-work/'.$home_work->id);
        $this->assertCount(0, HomeWork::all());
    }
}
