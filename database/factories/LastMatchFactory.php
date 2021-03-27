<?php

namespace Database\Factories;

use App\Models\LastMatch;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class LastMatchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LastMatch::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();

        $matchTypeId = $faker->numberBetween(1, 3);

        switch ($matchTypeId) {
            case 1:
                $round = $faker->numberBetween(1, 38);
                break;
            case 3:
                $round = $faker->text(50);
                break;
            default:
                $round = null;
                break;
        }

        return [
            'match_type_id' => $matchTypeId,
            'date' => Carbon::today()->format('Y-m-d'),
            'host' => $faker->lastName . ' ' . $faker->city,
            'guest' => $faker->lastName . ' ' . $faker->city,
            'score' => $faker->numberBetween(0, 15) . '-' . $faker->numberBetween(0, 15),
            'round' => $round
        ];
    }
}
