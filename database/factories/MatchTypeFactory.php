<?php

namespace Database\Factories;

use App\Models\MatchType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;


class MatchTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MatchType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();

        return [
            'type' => $faker->text(50),
            'name' => null
        ];
    }
}
