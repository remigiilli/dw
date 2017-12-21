<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTalentOptionIdToTalentAdvanceTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chapter_talent_advance', function (Blueprint $table) {
	    $table->integer('talent_option_id')->nullable()->unsigned();
	    $table->foreign('talent_option_id')->references('id')->on('talent_options');     
        });
        
        Schema::table('speciality_talent_advance', function (Blueprint $table) {
	    $table->integer('talent_option_id')->nullable()->unsigned();
	    $table->foreign('talent_option_id')->references('id')->on('talent_options');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chapter_talent_advance', function (Blueprint $table) {
             $table->dropColumn('talent_option_id');
        }); 
        
        Schema::table('speciality_talent_advance', function (Blueprint $table) {
             $table->dropColumn('talent_option_id');
        }); 
    }
}
