<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charachter_skill', function (Blueprint $table) {    
	  $table->increments('id');
	  $table->integer('character_id')->unsigned()->index();
	  $table->foreign('character_id')->references('id')->on('characters');
	  $table->integer('skill_id')->unsigned()->index();
	  $table->foreign('skill_id')->references('id')->on('skills');
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
	Schema::drop('charachter_skill');
    }
}
