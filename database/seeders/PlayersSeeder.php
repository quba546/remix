<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < $faker->numberBetween(20, 30); $i++) {
            DB::table('players_stats')->insert([
                'nr' => $faker->numberBetween(1, 99),
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'position' => $faker->randomElement(['bramkarz', 'obrońca', 'pomocnik', 'napastnik']),
                'goals' => $faker->numberBetween(0, 30),
                'assists' => $faker->numberBetween(0, 20),
                'clean_sheets' => $faker->numberBetween(0, 38),
                'yellow_cards' => $faker->numberBetween(0, 10),
                'red_cards' => $faker->numberBetween(0, 4),
                'played_matches' => $faker->numberBetween(0, 38),
                'created_at' => Carbon::now()->subDays($faker->numberBetween(100, 200)),
                'updated_at' => Carbon::now()->subDays($faker->numberBetween(0, 99))
            ]);
        }
    }
}
