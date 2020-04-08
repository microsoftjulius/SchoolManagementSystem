<?php

namespace Tests\Feature\Accademics;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Subjects extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createSubject(){
        $this->withoutExceptionHandling();
        $response = $this->post('/create-subject',[
            ''
        ]);
    }

    /** @test */
    public function editSubject(){

    }

    /** @test */
    public function getAllSubjects(){

    }

    /** @test */
    public function getSingleSubject(){

    }

    /** @test */
    public function printSubject(){

    }

    /** @test */
    public function deleteSubject(){

    }
}
