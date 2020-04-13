<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDutiesModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            //$table->foreign('teacher_id')->references('id')->on('employees');
            $table->string('week');
            $table->unsignedBigInteger('term_id');
            //$table->foreign('term_id')->references('id')->on('terms');
            $table->unsignedBigInteger('created_by');
            //$table->foreign('created_by')->references('id')->on('users');
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
        Schema::dropIfExists('duties_models');
    }
}
