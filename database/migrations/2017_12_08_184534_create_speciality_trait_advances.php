<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialityTraitAdvances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	Schema::drop('speciality_trait_advances');
    }
}
