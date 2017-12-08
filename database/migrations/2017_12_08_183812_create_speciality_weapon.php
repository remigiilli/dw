<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialityWeapon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speciality_weapon', function (Blueprint $table) {    
	    $table->increments('id');
	    $table->integer('speciality_id')->unsigned()->index();
	    $table->foreign('speciality_id')->references('id')->on('specialities');
	    $table->integer('weapon_id')->unsigned()->index();
	    $table->foreign('weapon_id')->references('id')->on('weapons');
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
	Schema::drop('speciality_weapon');
    }
}
