<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('attribute', ['ws', 'bs', 's', 't', 'ag', 'int', 'per', 'wp', 'fel']);
            $table->text('description');            
	    $table->integer('group_id')->nullable()->unsigned();
	    $table->foreign('group_id')->references('id')->on('skill_groups');            
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
        Schema::drop('skills');
    }
}
