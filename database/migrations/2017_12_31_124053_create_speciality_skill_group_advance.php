<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialitySkillGroupAdvance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {            
        Schema::create('speciality_skill_group_advance', function (Blueprint $table) {    
	    $table->increments('id');
	    $table->integer('speciality_id')->unsigned()->index();
	    $table->foreign('speciality_id')->references('id')->on('specialities');
	    $table->integer('skill_group_id')->unsigned()->index();
	    $table->foreign('skill_group_id')->references('id')->on('skill_groups');
	    $table->integer('cost');
            $table->integer('rank');
            $table->integer('proficeincy');            
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
        Schema::drop('speciality_skill_group_advance');
    }
}
