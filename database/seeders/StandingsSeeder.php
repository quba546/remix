<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Standing;
use Illuminate\Database\Seeder;

class StandingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Standing::factory()->count(20)->create();
    }
}
