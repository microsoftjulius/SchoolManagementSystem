<?php

namespace Tests\Feature\AllClasses;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\ClassesModels\ClassRooms;

class ClassRoomsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createClassRoom(){
        $this->withoutExceptionHandling();
        $response = $this->post('/create-class-room',[
            'class_name' => 'Primary One',
            'class_teacher_id' => '1',
            'students_id' => '1',
            'stream_id' => 'East',
            'fees_amount' => 500000,
            'status'    => 'active'
        ]);
        $this->assertDatabaseHas('class_rooms',['class_name'=>'Primary One']);
    }

    /** @test */
    public function editClassRoom(){
        $this->createClassRoom();
        $class_id = ClassRooms::first()->id;
        $response = $this->patch('/edit-class-name/'.$class_id,[
            'class_name' => 'Primary Two'
        ]);
        $this->assertEquals('Primary Two',ClassRooms::first()->class_name);
    }

    /** @test */
    public function getAllClassRooms(){
        $this->createClassRoom();
        $response = $this->get('/get-all-class-rooms');
        $response->assertOk();
    }

    /** @test */
    public function temporalDeleteClassRoom(){
        $this->createClassRoom();
        $class_id = ClassRooms::first()->id;
        $response = $this->patch('/delete-class/'.$class_id,[
            'status' => 'removed'
        ]);
        $this->assertEquals('removed',ClassRooms::first()->status);
    }

    /** @test */
    public function parmanetlyDeleteClassRoom(){
        $this->createClassRoom();
        $class_id = ClassRooms::first()->id;
        $response = $this->delete('/parmanetly-delete-class/'.$class_id);
        $this->assertCount(0,ClassRooms::all());
    }

    /** @test */
    public function getParticularClassRoom(){
        $this->createClassRoom();
        $class_id = ClassRooms::first();
        $response = $this->get('/get-particular-class-room/'.$class_id->id);
        $response->assertOk();
    }
}
