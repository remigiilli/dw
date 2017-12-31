<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterSkillGroupAdvance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_skill_group_advance', function (Blueprint $table) {    
	    $table->increments('id');
	    $table->integer('chapter_id')->unsigned()->index();
	    $table->foreign('chapter_id')->references('id')->on('chapters');
	    $table->integer('skill_group_id')->unsigned()->index();
	    $table->foreign('skill_group_id')->references('id')->on('skill_groups');
	    $table->integer('cost');
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
        Schema::drop('chapter_skill_group_advance');
    }
}
