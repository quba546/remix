<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatchTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('match_types')->insert(
            [
                [
                    'id' => 1,
                    'type' => 'Mecz ligowy',
                    'name' => 'A klasa'
                ],
                [
                    'id' => 2,
                    'type' => 'Sparing',
                    'name' => ''
                ],
                [
                    'id' => 3,
                    'type' => 'Puchar Polski',
                    'name' => 'Szczebel okręgowy'
                ]
            ]
        );
    }
}
