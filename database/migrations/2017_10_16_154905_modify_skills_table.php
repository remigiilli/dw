<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifySkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skills', function (Blueprint $table) {
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
        Schema::table('skills', function (Blueprint $table) {
            $table->dropColumn('use');
            $table->dropColumn('special');
        });
    }
}
