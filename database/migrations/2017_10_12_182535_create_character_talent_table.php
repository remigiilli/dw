<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterTalentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_talent', function (Blueprint $table) {    
	  $table->increments('id');
	  $table->integer('character_id')->unsigned()->index();
	  $table->foreign('character_id')->references('id')->on('characters');
	  $table->integer('talent_id')->unsigned()->index();
	  $table->foreign('talent_id')->references('id')->on('talents');
	  $table->integer('talent_option_id')->nullable()->unsigned();
	  $table->foreign('talent_option_id')->references('id')->on('talent_options');          
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
	Schema::drop('character_talent');
    }
}
