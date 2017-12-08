<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterSkillAdvances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('chapter_skill_advances', function (Blueprint $table) {    
	    $table->increments('id');
	    $table->integer('chapter_id')->unsigned()->index();
	    $table->foreign('chapter_id')->references('id')->on('chapters');
	    $table->integer('skill_id')->unsigned()->index();
	    $table->foreign('skill_id')->references('id')->on('skills');
	    $table->integer('cost');
            $table->integer('rank');
            $table->integer('proficeincy');
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
	Schema::drop('chapter_skill_advances');
    }
}
