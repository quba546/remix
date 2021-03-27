<?php

namespace Database\Factories;

use App\Models\UpcomingMatch;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class UpcomingMatchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UpcomingMatch::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        $updatedAt = Carbon::now()->subMinutes($faker->numberBetween(0, 365 * 24 * 60));
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
            'date' => Carbon::now()->addDays($faker->numberBetween(1, 14))->format('Y-m-d'),
            'host' => $faker->lastName . ' ' . $faker->city,
            'guest' => $faker->lastName . ' ' . $faker->city,
            'place' => $faker->city,
            'created_at' => $updatedAt->subMinutes($faker->numberBetween(1, 2 * 365 * 24 * 60)),
            'updated_at' => $updatedAt,
            'round' => $round,
        ];
    }
}
