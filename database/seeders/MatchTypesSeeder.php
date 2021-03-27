<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\MatchType;
use Illuminate\Database\Seeder;

class MatchTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        MatchType::factory()->create([
            'type' => 'Mecz ligowy',
            'name' => 'A klasa grupa I'
        ]);
        MatchType::factory()->create(['type' => 'Sparing']);
        MatchType::factory()->create([
            'type' => 'Mecz pucharowy',
            'name' => 'Szczebel okręgowy'
        ]);
    }
}
