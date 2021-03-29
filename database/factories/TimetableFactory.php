<?php

namespace Database\Factories;

use App\Models\Timetable;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class TimetableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Timetable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        $day = $faker->numberBetween(1, 27);
        return [
                'round' => $faker->numberBetween(1, 50),
                'date' => $day . '-' . ($day + 1) . ' ' . $faker->randomElement(
                    [
                        'styczeń',
                        'luty',
                        'marzec',
                        'kwiecień',
                        'maj',
                        'czerwiec',
                        'lipiec',
                        'sierpień',
                        'wrzesień',
                        'październik',
                        'listopad',
                        'grudzień'
                    ]
                ),
                'matches' => "Orzeł Bażanówka|3-0|Victoria Pakoszówka|15 sierpnia, 18:00\n
                                (wo)\n
                                na boisku 0-2\n
                                Sanovia Lesko|10-0|Szarotka Nowosielce|15 sierpnia, 16:30\n
                                LKS Długie|3-1|LKS Płowce/Stróże Małe|16 sierpnia, 17:00\n
                                Górnik Strachocina|4-0|Lotniarz Bezmiechowa|16 sierpnia, 15:00\n
                                Zgoda Zarszyn|3-0|Remix Niebieszczany|16 sierpnia, 17:00\n
                                Bukowianka Bukowsko|6-1|Bieszczady Jankowce|16 sierpnia, 15:00\n
                                Osława Zagórz|5-1|Wiki Sanok|16 sierpnia, 14:00\n"
        ];
    }
}
