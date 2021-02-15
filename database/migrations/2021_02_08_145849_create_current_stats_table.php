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
        Schema::create('players_stats', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('nr')->nullable();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('position', 50)->nullable();
            $table->smallInteger('goals')->nullable()->default(0);
            $table->smallInteger('assists')->nullable()->default(0);
            $table->smallInteger('played_matches')->nullable()->default(0);
            $table->smallInteger('clean_sheets')->nullable()->default(0);
            $table->smallInteger('yellow_cards')->nullable()->default(0);
            $table->smallInteger('red_cards')->nullable()->default(0);
            $table->string('image', 200)->nullable()->default(null);
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
        Schema::dropIfExists('players_stats');
    }
}
