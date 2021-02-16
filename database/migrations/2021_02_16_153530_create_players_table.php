<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->smallInteger('nr')->nullable();
            $table->string('position', 50);
            $table->smallInteger('goals');
            $table->smallInteger('assists');
            $table->smallInteger('played_matches');
            $table->smallInteger('clean_sheets');
            $table->smallInteger('yellow_cards');
            $table->smallInteger('red_cards');
            $table->string('image', 200)->nullable();
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
        Schema::dropIfExists('players');
    }
}
