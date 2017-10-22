<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterPsychicPowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charachter_psychic_power', function (Blueprint $table) {    
	  $table->increments('id');
	  $table->integer('character_id')->unsigned()->index();
	  $table->foreign('character_id')->references('id')->on('characters');
	  $table->integer('psychic_power_id')->unsigned()->index();
	  $table->foreign('psychic_power_id')->references('id')->on('psychic_powers');
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
	Schema::drop('charachter_psychic_power');
    }
}
