<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialAbilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('special_abilities', function (Blueprint $table) {        
            $table->increments('id');
            $table->string('name');
            $table->text('description');
	    $table->integer('speciality_id')->nullable()->unsigned();
	    $table->foreign('speciality_id')->references('id')->on('specialities');                
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
        Schema::drop('special_abilities');
    }
}
