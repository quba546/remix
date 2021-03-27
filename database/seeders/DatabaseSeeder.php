<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.pl',
            'password' => Hash::make('admin123'),
            'role_id' => 0
        ]);
        User::factory()->create([
            'name' => 'moderator',
            'email' => 'moderator@moderator.pl',
            'password' => Hash::make('moderator123'),
            'role_id' => 1
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@user.pl',
            'password' => Hash::make('user123')
        ]);
        $this->call(StandingsSeeder::class);
        $this->call(PlayersSeeder::class);
        $this->call(MatchTypesSeeder::class);
        $this->call(LastMatchSeeder::class);
        $this->call(UpcomingMatchSeeder::class);
        $this->call(TimetableSeeder::class);
    }
}
