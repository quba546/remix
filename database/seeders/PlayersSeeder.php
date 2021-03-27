<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Player;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PlayersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Factory::create();
        Player::factory()
            ->count($faker->numberBetween(11, 35))
            ->create();
    }
}
