<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterWeaponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_weapon', function (Blueprint $table) {    
	    $table->increments('id');
	    $table->integer('character_id')->unsigned()->index();
	    $table->foreign('character_id')->references('id')->on('characters');
	    $table->integer('weapon_id')->unsigned()->index();
	    $table->foreign('weapon_id')->references('id')->on('weapons');
	    $table->integer('extra');
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
	Schema::drop('character_weapon');
    }
}
