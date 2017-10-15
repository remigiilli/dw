<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeaponSpecialQualityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapon_special_quality', function (Blueprint $table) {    
	  $table->increments('id');
	  $table->integer('weapon_id')->unsigned()->index();
	  $table->foreign('weapon_id')->references('id')->on('weapons');
	  $table->integer('special_quality_id')->unsigned()->index();
	  $table->foreign('special_quality_id')->references('id')->on('special_qualities');
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
	Schema::drop('weapon_special_quality');
    }
}
