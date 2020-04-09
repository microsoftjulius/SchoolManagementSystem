<?php

namespace Tests\Feature\Accademics;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\AccademicsModel\Term as Terms;
use Tests\TestCase;

class TermsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createTerm(){
        $this->withoutExceptionHandling();
        $response = $this->post('/create-term',[
            'term'     => 1,
            'year'     => 2019,
            'duration' => '4 months'
        ]);
        $this->assertDatabaseHas('terms',['year'=>2019]);
    }

    /** @test */
    public function editTerm(){
        $this->createTerm();
        $term = Terms::first();
        $response = $this->patch('/update-term/'.$term->id,[
            'term'     => 1,
            'year'     => 2019,
            'duration' => '4.5 months'
        ]);
    }

    /** @test */
    public function getAllTerms(){
        $this->createTerm();
        $response = $this->get('/get-all-terms');
        $response->assertOk();
    }

    /** @test */
    public function getSingleTerm(){
        $this->createTerm();
        $term = Terms::first();
        $response = $this->get('/get-single-term/'.$term->id);
        $response->assertOk();
    }

    /** @test */
    public function deleteTerm(){
        $this->createTerm();
        $term = Terms::first();
        $response = $this->delete('/delete-single-term/'.$term->id);
        $this->assertCount(0, Terms::all());
    }
}
