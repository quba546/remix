<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentSeasonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('season_table', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('place')->nullable()->default(null);
            $table->string('team_name')->nullable()->default(null);
            $table->tinyInteger('played_matches')->nullable()->default(null);
            $table->tinyInteger('points')->nullable()->default(null);
            $table->tinyInteger('wins')->nullable()->default(null);
            $table->tinyInteger('draws')->nullable()->default(null);
            $table->tinyInteger('defeats')->nullable()->default(null);
            $table->string('goal_ratio', 50)->nullable()->default(null);
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
        Schema::dropIfExists('season_table');
    }
}
