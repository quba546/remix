<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StandingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $wins = $faker->numberBetween(0, 38);
            $drows = $faker->numberBetween(0, 38 - $wins);
            $losses = 38 - $wins - $drows;
            $goalsScored = $faker->numberBetween(0, 100);
            $goalsConceded = $faker->numberBetween(0, 100);

            DB::table('standings')->insert([
                'position' => $i + 1,
                'team' => $faker->lastName . ' ' . $faker->city,
                'played_matches' => $faker->numberBetween(0, 38),
                'points' => $wins * 3 + $drows * 1,
                'wins' => $wins,
                'draws' => $drows,
                'losses' => $losses,
                'goals_scored' => $goalsScored,
                'goals_conceded' => $goalsConceded,
                'goals_difference' => $goalsScored - $goalsConceded,
                'league' => 'Klasa A 2020/2021, Grupa: Krosno I',
                'created_at' => Carbon::now()->subDays($faker->numberBetween(100, 200)),
                'updated_at' => Carbon::now()->subDays($faker->numberBetween(0, 99))
            ]);
        }
    }
}
