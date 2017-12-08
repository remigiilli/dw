<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialityWargear extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speciality_wargear', function (Blueprint $table) {    
	    $table->increments('id');
	    $table->integer('speciality_id')->unsigned()->index();
	    $table->foreign('speciality_id')->references('id')->on('specialities');
	    $table->integer('wargear_id')->unsigned()->index();
	    $table->foreign('wargear_id')->references('id')->on('wargear');
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
	Schema::drop('speciality_wargear');
    }
}
