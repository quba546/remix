<?php

namespace Database\Factories;

use App\Models\Standing;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class StandingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Standing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();

        $wins = $faker->numberBetween(0, 38);
        $drows = $faker->numberBetween(0, 38 - $wins);
        $losses = 38 - $wins - $drows;
        $goalsScored = $faker->numberBetween(0, 100);
        $goalsConceded = $faker->numberBetween(0, 100);
        $updatedAt = Carbon::now()->subMinutes($faker->numberBetween(0, 365 * 24 * 60));

        return [
            'position' => $faker->unique()->numberBetween(1, 20),
            'team' => $faker->lastName . ' ' . $faker->city,
            'played_matches' => $faker->numberBetween(0, 38),
            'points' => $wins * 3 + $drows * 1,
            'wins' => $wins,
            'draws' => $drows,
            'losses' => $losses,
            'goals_scored' => $goalsScored,
            'goals_conceded' => $goalsConceded,
            'goals_difference' => $goalsScored - $goalsConceded,
            'updated_at' => $updatedAt,
            'created_at' => $updatedAt->subMinutes($faker->numberBetween(1, 2 * 365 * 24 * 60))
        ];
    }
}
