<?php

namespace Tests\Feature\Teachers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\UsersPackage\Teachersmodel as Teacher;
use Tests\TestCase;

class TeachersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createTeacher(){
        $this->withoutExceptionHandling();
        $response = $this->post('/create-teacher',[
            'first_name'    => 'Ruth',
            'last_name'     => 'Namakula',
            'date_of_birth' => '10/10/1993',
            'image'         => 'images/path',
            'District'      => 'Kampala',
            'Village'       => 'Nansana',
            'NIN'           => 'CMP323124RE2',
            'Telephone'     => '256777630441',
            'role_id'          => '5'
        ]);
        $this->assertDatabaseHas('teachers',['first_name'=>'Ruth']);
    }

    /** @test */
    public function editTeacher(){
        $this->createTeacher();
        $teacher = Teacher::first();
        $response = $this->patch('/edit-teacher/'.$teacher->id,[
            'first_name' => 'Joan',
        ]);
        $this->assertEquals('Joan',Teacher::first()->first_name);
    }

    /** @test */
    public function getAllTeachers(){
        $this->createteacher();
        $response = $this->get('/get-all-teachers');
        $this->assertCount(1,Teacher::all());
    }

    /** @test */
    public function suspendTeacher(){
        $this->createTeacher();
        $teacher = Teacher::first();
        $response = $this->patch('/suspend-teacher/'.$teacher->id,[
            'status' => 'suspended'
        ]);
        $this->assertEquals('suspended',Teacher::first()->status);
    }

    /** @test */
    public function ExpelTeacher(){
        $this->createTeacher();
        $teacher = Teacher::first();
        $response = $this->patch('/expel-teacher/'.$teacher->id,[
            'status' => 'expelled'
        ]);
        $this->assertEquals('expelled',Teacher::first()->status);
    }

    /** @test */
    public function assignRole(){
        $this->createTeacher();
        $teacher = Teacher::first();
        $response = $this->patch('/assign-role-to-teacher/'.$teacher->id,[
            'role_id' => '4'
        ]);
        $this->assertEquals('4',Teacher::first()->role_id);
    }
}
