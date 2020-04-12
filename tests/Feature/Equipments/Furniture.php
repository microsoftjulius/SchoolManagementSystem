<?php

namespace Tests\Feature\Equipments;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Furniture extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function createFurniture(){
        $this->withoutExceptionHandling();
        $response = $this->post('/create-furniture',[
            'furniture_name' => 'bench',
            'number_bought'  => 30,
            'created_by'     => 1
        ]);
        $this->assertDatabaseHas('furniture',['furniture_name'=>'bench']);
    }

    /** @test */
    public function editFurniture(){
        $this->createFurniture();
        $furniture = Furniture::first();
        $response = $this->post('/edit-furniture/'.$furniture->id,[
            'furniture_name' => 'bench',
            'number_bought'  => 34,
            'created_by'     => 1
        ]);
        $this->assertEquals(34,Furniture::first()->number_bought);
    }

    /** @test */
    public function getAllFurnitures(){
        $this->createFurniture();
        $response = $this->get('/get-all-furniture');
        $response->assertOk();
    }

    /** @test */
    public function deleteFurniture(){
        $this->createFurniture();
        $furniture = Furniture::first();
        $response = $this->delete('/delete-furniture/'.$furniture->id);
        $this->assertCount(0, Furniture::all());
    }
}
