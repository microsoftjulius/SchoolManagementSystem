<?php

namespace Tests\Feature\Students;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\UsersPackage\Students;

class StudentsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createStudent(){
        $this->withoutExceptionHandling();
        $response = $this->post('/create-student',[
            'guardian_id'   => 1,
            'class_id'      => 1,
            'first_name'    => 'Jackson',
            'student_id'    => '1',
            'last_name'     => 'Ssemakula',
            'date_of_birth' => '10/10/1994',
            'image'         => 'images/path',
            'status'        => 'active',
            'Telephone'     => '256702913451',
            'former_school' => 'Stephen Jota Children Center'
        ]);
        $this->assertDatabaseHas('students',['guardian_id'=>1]);
    }

    /** @test */
    public function editStudent(){
        $this->createStudent();
        $student = Students::first();
        $response = $this->patch('/edit-student/'.$student->id,[
            'guardian_id' => 2,
            'class_id'    => 1
        ]);
        $this->assertEquals(2,Students::first()->guardian_id);
    }

    /**@test */
    public function getAllStudents(){
        $this->createStudent();
        $response = $this->get('/get-all-students');
        $this->assertCount(1,Students::all());
    }
    /** @test */
    public function suspendStudent(){
        $this->createStudent();
        $student = Students::first();
        $response = $this->patch('/suspend-student/'.$student->id,[
            'status' => 'suspended'
        ]);
        $this->assertEquals('suspended',Students::first()->status);
    }

    /** @test */
    public function ExpelStudent(){
        $this->createStudent();
        $student = Students::first();
        $response = $this->patch('/expel-student/'.$student->id,[
            'status' => 'expelled'
        ]);
        $this->assertEquals('expelled',Students::first()->status);
    }

    /**@test */
    public function getParticularStudent(){
        $this->createStudent();
        $student = Students::first();
        $response = $this->get('/get-particular-student/'.$student->id);
        $response->assertOk();
    }
}
