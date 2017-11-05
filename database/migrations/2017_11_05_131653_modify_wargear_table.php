<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyWargearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wargear', function (Blueprint $table) {
	    $table->integer('wargear_category_id')->nullable()->unsigned();
	    $table->foreign('wargear_category_id')->references('id')->on('wargear_categories');     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wargear', function (Blueprint $table) {
            $table->dropColumn('wargear_category_id');
        });
    }
}
