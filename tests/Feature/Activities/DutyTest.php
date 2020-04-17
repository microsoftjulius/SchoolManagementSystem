<?php

namespace Tests\Feature\Activities;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\ActivitiesPackage\DutiesModel as Duty;
use Tests\TestCase;

class DutyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createDuty(){
        $this->withoutExceptionHandling();
        $response = $this->post('/create-duty',[
            'teacher_id' => 1,
            'week'       => 1,
            'term_id'    => 1,
            'created_by' => 1,
        ]);
        $this->assertDatabaseHas('duties',['week'=>1]);
    }

    /** @test */
    public function editDuty(){
        $this->createDuty();
        $duty = Duty::first();
        $response = $this->patch('/edit-duty-information/'.$duty->id,[
            'teacher_id' => 2,
            'week'       => 1,
            'term_id'    => 1,
            'created_by' => 1,
        ]);
        $this->assertEquals('2', Duty::first()->teacher_id);
    }

    /**@test */
    public function getAllDuties(){
        $this->createDuty();
        $response = $this->get('/get-all-duties');
        $response->assertOk();
    }

    /** @test */
    public function deleteDuty(){
        $this->createDuty();
        $duty = Duty::first();
        $response = $this->delete('/delete-duty-information/'.$duty->id);
        $this->assertCount(0, Duty::all());
    }
}
