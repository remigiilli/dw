<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	Schema::drop('charachter_skill');
        Schema::create('character_skill', function (Blueprint $table) {    
	  $table->increments('id');
	  $table->integer('character_id')->unsigned()->index();
	  $table->foreign('character_id')->references('id')->on('characters');
	  $table->integer('skill_id')->unsigned()->index();
	  $table->foreign('skill_id')->references('id')->on('skills');
	  $table->integer('proficeincy');
	  $table->timestamps();
        });	        
        Schema::drop('charachter_wargear');
        Schema::create('character_wargear', function (Blueprint $table) {    
	  $table->increments('id');
	  $table->integer('character_id')->unsigned()->index();
	  $table->foreign('character_id')->references('id')->on('characters');
	  $table->integer('wargear_id')->unsigned()->index();
	  $table->foreign('wargear_id')->references('id')->on('wargear');
          $table->integer('amount');
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
        Schema::drop('character_skill');
        Schema::create('charachter_skill', function (Blueprint $table) {    
	  $table->increments('id');
	  $table->integer('character_id')->unsigned()->index();
	  $table->foreign('character_id')->references('id')->on('characters');
	  $table->integer('skill_id')->unsigned()->index();
	  $table->foreign('skill_id')->references('id')->on('skills');
	  $table->integer('proficeincy');
	  $table->timestamps();
        });        
        Schema::drop('character_wargear');
        Schema::create('charachter_wargear', function (Blueprint $table) {    
	  $table->increments('id');
	  $table->integer('character_id')->unsigned()->index();
	  $table->foreign('character_id')->references('id')->on('characters');
	  $table->integer('wargear_id')->unsigned()->index();
	  $table->foreign('wargear_id')->references('id')->on('wargear');
          $table->integer('amount');
	  $table->timestamps();
        });        
    }
}
