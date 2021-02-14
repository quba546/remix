<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LastMatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('last_match')->insert([
            'match_type' => 'ligowy',
            'round' => 10,
            'date' => Carbon::today(),
            'host' => 'Remix Niebieszczany',
            'guest' => 'Górnik Strachocina',
            'score' => '2-1',
            'created_at' => Carbon::now()->subDays(Factory::create()->numberBetween(100, 200)),
            'updated_at' => Carbon::now()->subDays(Factory::create()->numberBetween(0, 99))
        ]);
    }
}
