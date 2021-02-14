<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $wins = $faker->numberBetween(0, 38);
            $drows = $faker->numberBetween(0, 38 - $wins);
            $defats = 38 - $wins - $drows;

            DB::table('season_table')->insert([
                'place' => $i + 1,
                'team_name' => $faker->lastName . ' ' . $faker->city,
                'played_matches' => $faker->numberBetween(0, 38),
                'points' => $wins * 3 + $drows * 1,
                'wins' => $wins,
                'draws' => $drows,
                'defeats' => $defats,
                'goal_ratio' => $faker->numberBetween(0, 100) . '-' . $faker->numberBetween(0, 100),
                'created_at' => Carbon::now()->subDays($faker->numberBetween(100, 200)),
                'updated_at' => Carbon::now()->subDays($faker->numberBetween(0, 99))
            ]);
        }
    }
}
