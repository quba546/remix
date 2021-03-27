<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\LastMatch;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class LastMatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Faker::create();
        $updatedAt = Carbon::now()->subMinutes($faker->numberBetween(0, 365 * 24 * 60));

        LastMatch::factory()->create([
            'created_at' => $updatedAt->subMinutes($faker->numberBetween(1, 2 * 365 * 24 * 60)),
            'updated_at' => $updatedAt
        ]);
    }
}
