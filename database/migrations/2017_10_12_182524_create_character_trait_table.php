<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterTraitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_trait', function (Blueprint $table) {    
	  $table->increments('id');
	  $table->integer('character_id')->unsigned()->index();
	  $table->foreign('character_id')->references('id')->on('characters');
	  $table->integer('trait_id')->unsigned()->index();
	  $table->foreign('trait_id')->references('id')->on('traits');
	  $table->string('extra');
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
	Schema::drop('character_trait');
    }
}
