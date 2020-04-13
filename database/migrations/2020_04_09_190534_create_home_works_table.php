<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_works', function (Blueprint $table) {
            $table->id();
            $table->Integer('year');
            $table->unsignedBigInteger('class_id');
            //$table->foreign('class_id')->references('id')->on('class_rooms');
            $table->unsignedBigInteger('subject_id');
            //$table->foreign('subject_id')->references('id')->on('subjects');
            $table->unsignedBigInteger('created_by');
            //$table->foreign('created_by')->references('id')->on('users');
            $table->string('paper_path');
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
        Schema::dropIfExists('home_works');
    }
}
