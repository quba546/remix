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
                'matches' => "Orzeł Bażanówka\t3-0\tVictoria Pakoszówka\t15 sierpnia, 18:00\r\n
(wo)\r\n
na boisku 0-2\r\n
Sanovia Lesko\t10-0\tSzarotka Nowosielce\t15 sierpnia, 16:30\r\n
LKS Długie\t3-1\tLKS Płowce/Stróże Małe\t16 sierpnia, 17:00\r\n
Górnik Strachocina\t4-0\tLotniarz Bezmiechowa\t16 sierpnia, 15:00\r\n
Zgoda Zarszyn\t3-0\tRemix Niebieszczany\t16 sierpnia, 17:00\r\n
Bukowianka Bukowsko\t6-1\tBieszczady Jankowce\t16 sierpnia, 15:00\r\n
Osława Zagórz\t5-1\tWiki Sanok\t16 sierpnia, 14:00"
        ];
    }
}
