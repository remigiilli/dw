<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePsychicPowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psychic_powers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');            
            $table->string('action');
            $table->boolean('opposed');
            $table->integer('range');
            $table->integer('range_type');
            $table->boolean('sustained');
            $table->text('description');
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
        Schema::drop('psychic_powers');
    }
}
