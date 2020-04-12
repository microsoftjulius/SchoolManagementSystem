<?php

namespace Tests\Feature\Activities;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\ActivitiesPackage\CocuricularActivitesModel as CoCurricularActivities;
use Tests\TestCase;

class CoCurricularTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createActivity(){
        $this->withoutExceptionHandling();
        $response = $this->post('/create-co-curricular-activity',[
            'activity'   => 'Sports',
            'date'       => '2020-02-23 00:00:00',
            'created_by' => 1
        ]);
        $this->assertDatabaseHas('cocuricular_activites',['activity'=>'Sports']);
    }

    /** @test */
    public function updateActivity(){
        $this->createActivity();
        $activity = CoCurricularActivities::first();
        $response = $this->patch('/update-co-curricular-activity/'.$activity->id,[
            'activity'   => 'Soccer',
            'date'       => '2020-02-23 00:00:00',
            'created_by' => 1
        ]);
        $this->assertEquals('Soccer',CoCurricularActivities::first()->activity);
    }

    /** @test */
    public function getAllActivities(){
        $this->createActivity();
        $response = $this->get('/get-all-activities');
        $response->assertOk();
    }

    /** @test */
    public function deleteActivity(){
        $this->createActivity();
        $activity = CoCurricularActivities::first();
        $response = $this->delete('/delete-activity/'.$activity->id);
        $this->assertCount(0, CoCurricularActivities::all());
    }
}
