<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoloModeAbilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('solo_mode_abilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('rank');
            $table->decimal('action', 3, 1);
            $table->text('effect');
            $table->text('improvement');
	    $table->integer('chapter_id')->nullable()->unsigned();
	    $table->foreign('chapter_id')->references('id')->on('chapters');     
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
        Schema::drop('solo_mode_abilities');
    }
}
