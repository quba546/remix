<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLastMatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('last_match', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_type_id');
            $table->date('date')->nullable();
            $table->string('host', 100);
            $table->string('guest', 100);
            $table->string('score', 10);
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
        Schema::dropIfExists('last_match');
    }
}
