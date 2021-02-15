<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddForeignKeyToUpcomingMatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('upcoming_match', function (Blueprint $table) {
            $table->foreign('match_type_id')->references('id')->on('match_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('upcoming_match', function (Blueprint $table) {
            $table->dropForeign(['match_type_id']);
        });
    }
}
