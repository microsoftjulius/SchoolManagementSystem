<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClassRooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class_name');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('class_teacher_id')->nullable();
            //$table->foreign('class_teacher_id')->references('id')->on('employees');
            $table->unsignedBigInteger('students_id')->nullable();
            //$table->foreign('students_id')->references('id')->on('students');
            $table->unsignedBigInteger('stream_id')->nullable();
            //$table->foreign('stream_id')->references('id')->on('streams');
            $table->bigInteger('fees_amount');
            $table->enum('status',['active','removed'])->default('active');
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
        //
    }
}
