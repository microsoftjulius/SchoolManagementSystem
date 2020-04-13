<?php

namespace Tests\Feature\AllClasses;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\ClassesModels\Streams;

class StreamsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createStream(){
        $this->withoutExceptionHandling();
        $response = $this->post('/create-stream',[
            'stream_name' => 'West',
            'created_by'  => '',
            'status'      => 'active'
        ]);
        $this->assertDatabaseHas('streams',['stream_name'=>'West']);
    }

    /** @test */
    public function editStream(){
        $this->createStream();
        $stream_id = Streams::first()->id;
        $response = $this->patch('/edit-stream-name/'.$stream_id,[
            'stream_name' => 'East'
        ]);
        $this->assertEquals('East',Streams::first()->stream_name);
    }

    /** @test */
    public function getAllStreams(){
        $this->createStream();
        $response = $this->get('/get-all-streams');
        $response->assertOk();
    }

    /** @test */
    public function temporalDeleteStream(){
        $this->createStream();
        $stream_id = Streams::first()->id;
        $response = $this->patch('/delete-stream/'.$stream_id,[
            'status' => 'removed'
        ]);
        $this->assertEquals('removed',Streams::first()->status);
    }

    /** @test */
    public function parmanetlyDeleteStream(){
        $this->createStream();
        $stream_id = Streams::first()->id;
        $response = $this->delete('/parmanetly-delete-stream/'.$stream_id);
        $this->assertCount(0,Streams::all());
    }

    /** @test */
    public function getParticularStream(){
        $this->createStream();
        $stream_id = Streams::first();
        $response = $this->get('/get-particular-stream/'.$stream_id->id);
        $response->assertOk();
    }
}
