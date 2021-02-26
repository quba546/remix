<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatchTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('match_types')->insert([
            [
                'id' => 1,
                'type' => 'Mecz ligowy',
                'name' => 'Klasa B 2020/2021, Grupa: Krosno I',
                'round' => '10'
            ], [
                'id' => 2,
                'type' => 'Sparing',
                'name' => null,
                'round' => null
            ], [
                'id' => 3,
                'type' => 'Mecz pucharowy',
                'name' => 'Puchar Polski',
                'round' => null
            ],
        ]);
    }
}
