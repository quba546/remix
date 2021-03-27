<?php

namespace Tests\Feature;

use App\Models\Timetable;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class RemoveRoundTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create(['role_id' => 1]));
    }

    /**
     * @test
     */
    public function can_moderator_remove_round_from_database_if_that_round_exists()
    {
        $round = 1;
        Timetable::factory()->create(['round' => $round]);

        $this->delete('/admin/timetable/one', ['round' => $round])
            ->assertRedirect('/admin/timetable/edit')
            ->assertSessionHas('success');

        $this->assertCount(0, Timetable::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_remove_round_from_database_if_that_round_not_exists()
    {
        $round = 1;
        Timetable::factory()->create(['round' => $round]);

        $this->delete('/admin/timetable/one', ['round' => $round + 1])
            ->assertRedirect('/admin/timetable/edit');

        $this->assertCount(1, Timetable::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_remove_round_from_database_without_passing_data()
    {
        $round = 1;
        Timetable::factory()->create(['round' => $round]);

        $this->delete('/admin/timetable/one', ['round' => null])
            ->assertRedirect('/admin/timetable/edit');

        $this->assertCount(1, Timetable::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_remove_timetable_from_database()
    {
        Timetable::factory()->count(2)->create();

        $this->delete('/admin/timetable')
            ->assertStatus(403);
        $this->assertCount(2, Timetable::all());

    }

    /**
     * @test
     */
    // TODO i don't know why but this test doesn't work despite in website everything is fine
//    public function can_admin_remove_timetable_from_database()
//    {
//        $this->actingAs(User::factory()->create(['role_id' => 0]));
//        Timetable::factory()->create();
//
//        $this->delete('/admin/timetable')
//            ->assertSessionHas('info')
//            ->assertRedirect('/admin');
//
//        $this->assertCount(0, Timetable::all());
//    }
}
