<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyWeaponsTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weapons', function (Blueprint $table) {
	    $table->integer('weapon_category_id')->nullable()->unsigned();
	    $table->foreign('weapon_category_id')->references('id')->on('weapon_categories');     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weapons', function (Blueprint $table) {
            $table->dropColumn('weapon_category_id');
        });
    }
}
