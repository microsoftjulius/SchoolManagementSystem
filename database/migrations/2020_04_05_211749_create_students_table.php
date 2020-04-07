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
            $table->bigInteger('user_id');
            $table->bigInteger('created_by');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('former_school')->nullable();
            $table->string('image_path');
            $table->bigInteger('guardian_id');
            $table->bigInteger('class_id');
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
