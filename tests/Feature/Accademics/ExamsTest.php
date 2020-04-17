<?php

namespace Tests\Feature\Accademics;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\AccademicsModel\ExamMarks;
use Tests\TestCase;

class ExamsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createExamMarks(){
        $this->withoutExceptionHandling();
        $response = $this->post('/create-exam-marks',[
            'subject_id' => 1,
            'student_id' => 1,
            'marks'      => 78,
            'comment'    => 'Very Good',
            'created_by' => 1,
            'class_id'   => 1
        ]);
        $this->assertDatabaseHas('exam_marks',['marks'=>78]);
    }

    /** @test */
    public function editExamMarks(){
        $this->createExamMarks();
        $exam_marks = ExamMarks::first();
        $response = $this->patch('/update-exam-marks/'.$exam_marks->id,[
            'subject_id' => 1,
            'student_id' => 1,
            'marks'      => 77,
            'comment'    => 'Very Good',
            'created_by' => 1,
            'class_id'   => 1
        ]);
        $this->assertEquals(77,ExamMarks::first()->marks);
    }

    /**@test */
    public function getAllExams(){
        $this->createExamMarks();
        $response = $this->get('/get-all-exam-marks-for-students');
        $response->assertOk();
    }

    /**@test */
    public function getSingleExamMarks(){
        $this->createExamMarks();
        $exam_marks = ExamMarks::first();
        $response = $this->get('/get-single-exam-marks-for-one-student/'.$exam_marks->id);
        $response->assertOk();
    }
    /** @test */
    public function deleteExamMarks(){
        $this->createExamMarks();
        $exam_marks = ExamMarks::first();
        $response = $this->delete('/delete-single-exam-marks/'.$exam_marks->id);
        $this->assertCount(0, ExamMarks::all());
    }
}
