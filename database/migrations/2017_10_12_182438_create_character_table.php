<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {    
	  $table->increments('id');
	  $table->string('name');
	  $table->text('description');
	  $table->integer('ws');
	  $table->integer('bs');
	  $table->integer('s');
	  $table->integer('t');
	  $table->integer('ag');
	  $table->integer('per');
	  $table->integer('int');
	  $table->integer('wp');
	  $table->integer('fel');
	  $table->integer('wounds');
	  $table->integer('psy');
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
	Schema::drop('characters');
    }
}
