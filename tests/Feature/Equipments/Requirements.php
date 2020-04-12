<?php

namespace Tests\Feature\Equipments;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Requirements extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function createRequirement(){
        $this->withoutExceptionHandling();
        $response = $this->post('/create-requirement',[
            'requirement_name' => 'bench',
            'number_bought'  => 30,
            'created_by'     => 1
        ]);
        $this->assertDatabaseHas('requirements',['requirement_name'=>'bench']);
    }

    /** @test */
    public function editRequirement(){
        $this->createRequirement();
        $requirement = Requirement::first();
        $response = $this->post('/edit-requirement/'.$requirement->id,[
            'requirement_name' => 'bench',
            'number_bought'  => 34,
            'created_by'     => 1
        ]);
        $this->assertEquals(34,Requirement::first()->number_bought);
    }

    /** @test */
    public function getAllRequirements(){
        $this->createRequirement();
        $response = $this->get('/get-all-requirements');
        $response->assertOk();
    }

    /** @test */
    public function deleteRequirement(){
        $this->createRequirement();
        $requirement = Requirement::first();
        $response = $this->delete('/delete-requirement/'.$requirement->id);
        $this->assertCount(0, Requirement::all());
    }
}
