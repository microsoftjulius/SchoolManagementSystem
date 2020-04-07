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
            $table->bigInteger('user_id');
            $table->bigInteger('created_by');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('date_of_birth');
            $table->string('image_path');
            $table->bigInteger('role_id');
            $table->string('District');
            $table->string('Village');
            $table->string('NIN');
            $table->string('Telephone');
            $table->string('level_of_education');
            $table->string('certificates');
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
