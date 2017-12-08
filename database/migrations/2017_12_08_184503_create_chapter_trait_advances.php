<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterTraitAdvances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('chapter_trait_advances', function (Blueprint $table) {    
	    $table->increments('id');
	    $table->integer('chapter_id')->unsigned()->index();
	    $table->foreign('chapter_id')->references('id')->on('chapters');
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
	Schema::drop('chapter_trait_advances');
    }
}
