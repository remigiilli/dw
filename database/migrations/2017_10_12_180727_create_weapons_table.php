<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeaponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');            
            $table->text('description');
            $table->integer('range');
            $table->boolean('rof1');
            $table->integer('rof2');
            $table->integer('rof3');
            $table->integer('dmg1');
            $table->integer('dmg2');
            $table->integer('dmg3');
            $table->enum('dmg4', ['e', 'x', 'i', 'r']);
            $table->integer('pen');
            $table->decimal('weight', 5, 2);
            $table->integer('req');
            $table->integer('clip');
            $table->decimal('rld', 3, 1);
            $table->enum('renown', ['r', 'd', 'f', 'h'])->nullable();
            $table->enum('type', ['p', 'b', 'h', 't', 'm', 'o'])->nullable();
            


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
	Schema::drop('weapons');
    }
}
