<?php

namespace Tests\Feature\Accademics;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\AccademicsModel\Subject;
use Tests\TestCase;

class SubjectsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createSubject(){
        $this->withoutExceptionHandling();
        $response = $this->post('/create-subject',[
            'subject_name' => 'biology',
            'subject_code' => '218930P',
            'teacher_id'   => 1,
            'created_by'   => 1
        ]);
        $this->assertDatabaseHas('subjects',['subject_name'=>'biology']);
    }

    /** @test */
    public function editSubject(){
        $this->createSubject();
        $subject = Subject::first();
        $response = $this->patch('/edit-subject/'.$subject->id,[
            'subject_code' => 'UI782Ps',
        ]);
        $this->assertDatabaseHas('subjects',['subject_code'=>'UI782Ps']);
    }

    /** @test */
    public function getAllSubjects(){
        $this->createSubject();
        $response = $this->get('/get-all-subjects');
        $response->assertOk();
    }

    /** @test */
    public function getSingleSubject(){
        $this->createSubject();
        $subject = Subject::first();
        $response = $this->get('/get-single-subject/'.$subject->id);
        $response->assertOk();
    }

    /** @test */
    public function deleteSubject(){
        $this->createSubject();
        $subject = Subject::first();
        $response = $this->delete('/delete-subject/'.$subject->id);
        $this->assertCount(0, Subject::all());
    }
}
