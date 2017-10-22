<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyWeaponsTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weapons', function (Blueprint $table) {
            $table->integer('range_type');
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
            $table->dropColumn('range_type');
        });
    }
}
