<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpcomingMatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Factory::create();

        DB::table('upcoming_match')->insert([
            'match_type_id' => $faker->numberBetween(1, 3),
            'date' => Carbon::today()->addDays(13),
            'host' => 'LKS Rafhaus Długie',
            'guest' => 'Remix Niebieszczany',
            'place' => 'Długie',
            'created_at' => Carbon::now()->subDays(Factory::create()->numberBetween(100, 200)),
            'updated_at' => Carbon::now()->subDays(Factory::create()->numberBetween(0, 99))
        ]);
    }
}
