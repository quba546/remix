<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\UpcomingMatch;
use Illuminate\Database\Seeder;

class UpcomingMatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        UpcomingMatch::factory()->create();
    }
}
