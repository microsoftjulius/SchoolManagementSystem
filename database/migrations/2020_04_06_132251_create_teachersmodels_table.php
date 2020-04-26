<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersmodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('employee_id');
            //$table->foreign('created_by')->references('id')->on('users');
            $table->string('efirst_name');
            $table->string('elast_name');
            $table->string('date_of_birth');
            $table->string('image_path');
            $table->unsignedBigInteger('role_id')->nullable();
            $table->enum('gender',['Male','Female'])->default('Male');
            //$table->foreign('role_id')->references('id')->on('roles');
            $table->string('District');
            $table->string('Village');
            $table->string('NIN');
            $table->string('Telephone');
            $table->string('level_of_education');
            $table->string('certificates')->nullable();
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
        Schema::dropIfExists('teachersmodels');
    }
}
