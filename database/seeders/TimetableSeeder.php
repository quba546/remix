<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Timetable;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Faker::create();
        $rounds = $faker->numberBetween(1, 38);
        for ($i = 0; $i < $rounds; $i++) {
            Timetable::factory()->create(['round' => $i + 1]);
        }
    }
}
