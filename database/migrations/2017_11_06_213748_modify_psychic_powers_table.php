<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyPsychicPowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('psychic_powers', function (Blueprint $table) {
	    $table->integer('psychic_power_category_id')->nullable()->unsigned();
	    $table->foreign('psychic_power_category_id')->references('id')->on('psychic_power_categories');     
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
             $table->dropColumn('psychic_power_category_id');
        });                   
    }
}
