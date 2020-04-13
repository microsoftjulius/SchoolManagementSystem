<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            //$table->foreign('student_id')->references('id')->on('students');
            $table->unsignedBigInteger('class_id');
            //$table->foreign('class_id')->references('id')->on('class_rooms');
            $table->unsignedBigInteger('subject_id');
            //$table->foreign('subject_id')->references('id')->on('subjects');
            $table->unsignedBigInteger('teacher_id');
            //$table->foreign('teacher_id')->references('id')->on('employees');
            $table->enum('attendance_status',['yes','no'])->default('no');
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
        Schema::dropIfExists('attendances');
    }
}
