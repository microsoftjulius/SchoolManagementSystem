<?php

namespace Tests\Feature\Accademics;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\AccademicsModel\PastPaper;
use App\Http\Resources\AccademicsResource\PastPapersResource;
use Tests\TestCase;

class PastPapersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createPastPaper(){
        $this->withoutExceptionHandling();
        $response = $this->post('/create-past-paper',[
            'year'       => 2018,
            'class_id'   => 1,
            'subject_id' => 1,
            'created_by' => 1,
            'paper_path' => 'path_to_past_paper'
        ]);
        $this->assertDatabaseHas('past_papers',['year'=>2018]);
    }

    /** @test */
    public function editPastPaper(){
        $this->createPastPaper();
        $past_paper = PastPaper::first();
        $response = $this->patch('/update-past-paper/'.$past_paper->id,[
            'year'       => 2019,
            'class_id'   => 1,
            'subject_id' => 1,
            'created_by' => 1,
            'paper_path' => 'path_to_past_paper'
        ]);
        $this->assertEquals('2019', PastPaper::first()->year);
    }

    /**@test */
    public function getAllPastPapers(){
        $this->createPastPaper();
        $response = $this->get('/get-all-past-papers');
        $response->assertOk();
    }

    /**@test */
    public function getSinglePastPaper(){
        $this->createPastPaper();
        $past_paper = PastPaper::first();
        $response = $this->get('/get-single-past-paper/'.$past_paper->id);
        $response->assertOk();
    }

    /** @test */
    public function downloadPastPaper(){
        $this->createPastPaper();
        $past_paper = PastPaper::first();
        $response = $this->get('/download-past-paper/'.$past_paper->id);
        $response->assertStatus(302);
    }

    /** @test */
    public function deletePastPaper(){
        $this->createPastPaper();
        $past_paper = PastPaper::first();
        $response = $this->delete('/delete-past-paper/'.$past_paper->id);
        $this->assertCount(0, PastPaper::all());
    }
}
