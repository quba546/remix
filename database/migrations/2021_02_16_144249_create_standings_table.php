<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standings', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('position');
            $table->string('team', 100);
            $table->smallInteger('played_matches');
            $table->smallInteger('points');
            $table->smallInteger('wins');
            $table->smallInteger('draws');
            $table->smallInteger('losses');
            $table->smallInteger('goals_scored');
            $table->smallInteger('goals_conceded');
            $table->smallInteger('goals_difference');
            $table->string('league', 100);
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
        Schema::dropIfExists('standings');
    }
}
