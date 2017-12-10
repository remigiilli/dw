<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameAdvancesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('chapter_trait_advances');        
        Schema::create('chapter_talent_advance', function (Blueprint $table) {    
	    $table->increments('id');
	    $table->integer('chapter_id')->unsigned()->index();
	    $table->foreign('chapter_id')->references('id')->on('chapters');
	    $table->integer('talent_id')->unsigned()->index();
	    $table->foreign('talent_id')->references('id')->on('talents');
	    $table->integer('cost');
	    $table->timestamps();
        });
        
        Schema::drop('speciality_trait_advances');        
        Schema::create('speciality_talent_advance', function (Blueprint $table) {    
	    $table->increments('id');
	    $table->integer('speciality_id')->unsigned()->index();
	    $table->foreign('speciality_id')->references('id')->on('specialities');
	    $table->integer('talent_id')->unsigned()->index();
	    $table->foreign('talent_id')->references('id')->on('talents');
	    $table->integer('cost');
            $table->integer('rank');
	    $table->timestamps();
        });        
        
        Schema::drop('chapter_skill_advances');
        Schema::create('chapter_skill_advance', function (Blueprint $table) {    
	    $table->increments('id');
	    $table->integer('chapter_id')->unsigned()->index();
	    $table->foreign('chapter_id')->references('id')->on('chapters');
	    $table->integer('skill_id')->unsigned()->index();
	    $table->foreign('skill_id')->references('id')->on('skills');
	    $table->integer('cost');
            $table->integer('proficeincy');
	    $table->timestamps();
        });        
        
        Schema::drop('speciality_skill_advances');
        Schema::create('speciality_skill_advance', function (Blueprint $table) {    
	    $table->increments('id');
	    $table->integer('speciality_id')->unsigned()->index();
	    $table->foreign('speciality_id')->references('id')->on('specialities');
	    $table->integer('skill_id')->unsigned()->index();
	    $table->foreign('skill_id')->references('id')->on('skills');
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
        Schema::drop('chapter_talent_advance');
        Schema::create('chapter_trait_advances', function (Blueprint $table) {    
	    $table->increments('id');
	    $table->integer('chapter_id')->unsigned()->index();
	    $table->foreign('chapter_id')->references('id')->on('chapters');
	    $table->integer('trait_id')->unsigned()->index();
	    $table->foreign('trait_id')->references('id')->on('traits');
	    $table->integer('cost');
            $table->integer('rank');
	    $table->timestamps();
        });
        
        Schema::drop('speciality_talent_advance');
        Schema::create('speciality_trait_advances', function (Blueprint $table) {    
	    $table->increments('id');
	    $table->integer('speciality_id')->unsigned()->index();
	    $table->foreign('speciality_id')->references('id')->on('specialities');
	    $table->integer('trait_id')->unsigned()->index();
	    $table->foreign('trait_id')->references('id')->on('traits');
	    $table->integer('cost');
            $table->integer('rank');
	    $table->timestamps();
        });        
        
        Schema::drop('chapter_skill_advance');
        Schema::create('chapter_skill_advances', function (Blueprint $table) {    
	    $table->increments('id');
	    $table->integer('chapter_id')->unsigned()->index();
	    $table->foreign('chapter_id')->references('id')->on('chapters');
	    $table->integer('skill_id')->unsigned()->index();
	    $table->foreign('skill_id')->references('id')->on('skills');
	    $table->integer('cost');
            $table->integer('rank');
            $table->integer('proficeincy');
	    $table->timestamps();
        });        
        
        Schema::drop('speciality_skill_advance');
        Schema::create('speciality_skill_advances', function (Blueprint $table) {    
	    $table->increments('id');
	    $table->integer('speciality_id')->unsigned()->index();
	    $table->foreign('speciality_id')->references('id')->on('specialities');
	    $table->integer('skill_id')->unsigned()->index();
	    $table->foreign('skill_id')->references('id')->on('skills');
	    $table->integer('cost');
            $table->integer('rank');
            $table->integer('proficeincy');
	    $table->timestamps();
        });        
    }
}
