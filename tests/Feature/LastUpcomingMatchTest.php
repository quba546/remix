<?php

namespace Tests\Feature;

use App\Models\LastMatch;
use App\Models\MatchType;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LastUpcomingMatchTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
//    public function can_moderator_update_last_match_to_database_with_valid_data()
//    {
//        $this->actingAs(User::factory()->create(['role_id' => 1]));
//
//        MatchType::factory()->has(LastMatch::factory(), 'lastMatch')->create();
//        LastMatch::factory()->create(['match_type_id' => 1]);
//
//        $this->put('/admin/matches/last', $this->data())
//            ->assertSessionHas('success')
//            ->assertRedirect('/admin/matches/last/edit');
//
//        $this->assertCount(1, LastMatch::all());
//    }

    private function data(): array
    {
        return [
            'match_type_id' => 1,
            'date' => '2021-03-27',
            'host' => 'Abbott Pfannerstillfort',
            'guest' => 'Mann West Ivyport',
            'score' => '5-7',
            'round' => '34'
        ];
    }
}
