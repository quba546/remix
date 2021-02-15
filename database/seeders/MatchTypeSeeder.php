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
        DB::table('match_type')->insert([
            [
                'id' => 1,
                'type' => 'Mecz ligowy',
                'round' => 10
            ],
            [
                'id' => 2,
                'type' => 'Sparing',
                'round' => null
            ],            [
                'id' => 3,
                'type' => 'Mecz pucharowy',
                'round' => null
            ],
        ]);
    }
}
