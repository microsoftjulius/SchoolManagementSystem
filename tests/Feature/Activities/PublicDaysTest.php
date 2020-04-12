<?php

namespace Tests\Feature\Activities;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\ActivitiesPackage\PublicDaysModel as PublicDays;
use Tests\TestCase;

class PublicDaysTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createPublicDay(){
        $this->withoutExceptionHandling();
        $response = $this->post('/create-public-day',[
            'public_day'   => 'good friday',
            'date'       => '2020-02-23 00:00:00',
            'created_by' => 1
        ]);
        $this->assertDatabaseHas('public_days',['public_day'=>'good friday']);
    }

    /** @test */
    public function updatePublicDay(){
        $this->createPublicDay();
        $public_day = PublicDays::first();
        $response = $this->patch('/update-public-day/'.$public_day->id,[
            'public_day'   => 'Easter Sunday',
            'date'       => '2020-02-23 00:00:00',
            'created_by' => 1
        ]);
        $this->assertEquals('Easter Sunday',PublicDays::first()->public_day);
    }

    /** @test */
    public function getAllActivities(){
        $this->createPublicDay();
        $response = $this->get('/get-all-public-days');
        $response->assertOk();
    }

    /** @test */
    public function deletePublicDay(){
        $this->createPublicDay();
        $public_day = PublicDays::first();
        $response = $this->delete('/delete-public-day/'.$public_day->id);
        $this->assertCount(0, PublicDays::all());
    }
}
