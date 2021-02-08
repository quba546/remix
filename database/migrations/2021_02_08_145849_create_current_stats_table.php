<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_players_stats', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('nr')->nullable();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('position', 50)->nullable();
            $table->tinyInteger('goals')->default(0);
            $table->tinyInteger('assists')->default(0);
            $table->tinyInteger('clean_sheets')->default(0);
            $table->tinyInteger('yellow_cards')->default(0);
            $table->tinyInteger('red_cards')->default(0);
            $table->tinyInteger('played_matches')->default(0);
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
        Schema::dropIfExists('current_stats');
    }
}
