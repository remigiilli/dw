<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChapterIdToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('psychic_powers', function (Blueprint $table) {
	    $table->integer('chapter_id')->nullable()->unsigned();
	    $table->foreign('chapter_id')->references('id')->on('chapters');     
        });
        
        Schema::table('weapons', function (Blueprint $table) {
	    $table->integer('chapter_id')->nullable()->unsigned();
	    $table->foreign('chapter_id')->references('id')->on('chapters');     
        });

        Schema::table('wargear', function (Blueprint $table) {
	    $table->integer('chapter_id')->nullable()->unsigned();
	    $table->foreign('chapter_id')->references('id')->on('chapters');     
        });               
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('psychic_powers', function (Blueprint $table) {
             $table->dropColumn('chapter_id');
        }); 
        
        Schema::table('weapons', function (Blueprint $table) {
             $table->dropColumn('chapter_id');
        }); 

        Schema::table('wargear', function (Blueprint $table) {
             $table->dropColumn('chapter_id');
        });         
    }
}
