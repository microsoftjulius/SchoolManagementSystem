<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_marks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subject_id');
            //$table->foreign('subject_id')->references('id')->on('subjects');
            $table->unsignedBigInteger('student_id');
            //$table->foreign('student_id')->references('id')->on('students');
            $table->unsignedBigInteger('term_id');
            $table->Integer('marks');
            $table->string('comment');
            $table->unsignedBigInteger('created_by');
            //$table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('class_id');
            //$table->foreign('class_id')->references('id')->on('class_rooms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_marks');
    }
}
