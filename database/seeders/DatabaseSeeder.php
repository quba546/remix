<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(TeamsSeeder::class);
        $this->call(PlayersSeeder::class);
        $this->call(LastMatchSeeder::class);
        $this->call(UpcomingMatchSeeder::class);
    }
}
