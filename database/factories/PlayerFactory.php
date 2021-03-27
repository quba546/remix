<?php

namespace Database\Factories;

use App\Models\Player;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class PlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        $updatedAt = Carbon::now()->subMinutes($faker->numberBetween(0, 365 * 24 * 60));
        return [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'nr' => $faker->randomElement([null, $faker->numberBetween(1, 99)]),
            'position' => $faker->randomElement(['bramkarz', 'obrońca', 'pomocnik', 'napastnik']),
            'goals' => $faker->numberBetween(0, 49),
            'assists' => $faker->numberBetween(0, 49),
            'played_matches' => $faker->numberBetween(0, 49),
            'clean_sheets' => $faker->numberBetween(0, 49),
            'yellow_cards' => $faker->numberBetween(0, 12),
            'red_cards' => $faker->numberBetween(0, 12),
            'image' => null,
            'updated_at' => $updatedAt,
            'created_at' => $updatedAt->subMinutes($faker->numberBetween(1, 2 * 365 * 24 * 60))
        ];
    }
}
