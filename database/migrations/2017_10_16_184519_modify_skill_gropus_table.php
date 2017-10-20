<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifySkillGropusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skill_groups', function (Blueprint $table) {
            $table->text('use');
            $table->text('special');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skill_groups', function (Blueprint $table) {
            $table->dropColumn('use');
            $table->dropColumn('special');
        });
    }
}
