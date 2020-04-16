<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsmodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('created_by');
            //$table->foreign('created_by')->references('id')->on('users');
            $table->string('pfirst_name');
            $table->string('plast_name');
            $table->string('date_of_birth');
            $table->string('image_path');
            $table->string('RelationShip');
            $table->string('District');
            $table->string('Village');
            $table->string('NIN');
            $table->string('Telephone');
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
        Schema::dropIfExists('parentsmodels');
    }
}
