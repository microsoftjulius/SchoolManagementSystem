<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            //$table->unsignedBigInteger('created_by')->nullable();
            //$table->foreign('created_by')->references('id')->on('users');
            $table->string('sfirst_name');
            $table->string('slast_name');
            $table->date('date_of_birth');
            $table->string('former_school')->nullable();
            $table->string('image_path');
            $table->unsignedBigInteger('guardian_id')->nullable();
            //$table->foreign('guardian_id')->references('id')->on('parents');
            $table->enum('status',['active','suspended','expelled'])->default('active');
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
        Schema::dropIfExists('students');
    }
}
