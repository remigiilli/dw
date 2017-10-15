<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalentTalentOption extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talent_talent_option', function (Blueprint $table) {
            $table->increments('id');                
	    $table->integer('talent_option_id')->unsigned();
	    $table->foreign('talent_option_id')->references('id')->on('talent_options');                        
            
	    $table->integer('talent_id')->unsigned();
	    $table->foreign('talent_id')->references('id')->on('talents');                        
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
	Schema::drop('talent_talent_option');
    }
}
