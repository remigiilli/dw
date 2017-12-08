<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialitySkill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speciality_skill', function (Blueprint $table) {    
	    $table->increments('id');
	    $table->integer('speciality_id')->unsigned()->index();
	    $table->foreign('speciality_id')->references('id')->on('specialities');
	    $table->integer('skill_id')->unsigned()->index();
	    $table->foreign('skill_id')->references('id')->on('skills');
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
	Schema::drop('speciality_skill');
    }
}
