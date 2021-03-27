<?php

namespace Tests\Feature;

use App\Models\Timetable;
use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class AddRoundTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create(['role_id' => 0]));
    }

    /**
     * @test
     */
    public function can_moderator_add_round_to_database_with_valid_data()
    {
        $this->post('/admin/timetable', Timetable::factory()->create()->toArray())
            ->assertRedirect('/admin/timetable/create');

        $this->assertCount(1, Timetable::all());

    }

    /**
     * @test
     */
    public function cannot_moderator_add_round_to_database_without_passing_round()
    {
        $this->post('/admin/timetable', Timetable::factory()->make(['round' => ''])->toArray())
            ->assertSessionHasErrors('round');

        $this->assertCount(0, Timetable::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_round_to_database_with_passing_round_not_as_integer()
    {
        $this->post('/admin/timetable', Timetable::factory()->make(['round' => 'abc'])->toArray())
            ->assertSessionHasErrors('round');

        $this->assertCount(0, Timetable::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_round_to_database_with_passing_round_less_than_1()
    {
        $this->post('/admin/timetable', Timetable::factory()->make(['round' => 0])->toArray())
            ->assertSessionHasErrors('round');

        $this->assertCount(0, Timetable::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_round_to_database_with_passing_round_grater_than_50()
    {
        $this->post('/admin/timetable', Timetable::factory()->make(['round' => 51])->toArray())
            ->assertSessionHasErrors('round');

        $this->assertCount(0, Timetable::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_round_to_database_without_passing_date()
    {
        $this->post('/admin/timetable', Timetable::factory()->make(['date' => ''])->toArray())
            ->assertSessionHasErrors('date');

        $this->assertCount(0, Timetable::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_round_to_database_with_passing_date_not_as_string()
    {
        $this->post('/admin/timetable', Timetable::factory()->make(['date' => 123])->toArray())
            ->assertSessionHasErrors('date');

        $this->assertCount(0, Timetable::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_round_to_database_with_passing_date_with_more_than_50_characters()
    {
        $faker = Factory::create();

        $this->post('/admin/timetable', Timetable::factory()
            ->make(['date' => $faker->asciify(str_repeat('*', 51))])
            ->toArray()
        )->assertSessionHasErrors('date');;

        $this->assertCount(0, Timetable::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_round_to_database_without_passing_matches()
    {
        $this->post('/admin/timetable', Timetable::factory()->make(['matches' => ''])->toArray())
            ->assertSessionHasErrors('matches');

        $this->assertCount(0, Timetable::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_round_to_database_with_passing_matches_not_as_string()
    {
        $this->post('/admin/timetable', Timetable::factory()->make(['matches' => 123])->toArray())
            ->assertSessionHasErrors('matches');

        $this->assertCount(0, Timetable::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_round_to_database_with_passing_matches_with_more_than_1000_characters()
    {
        $faker = Factory::create();

        $this->post('/admin/timetable', Timetable::factory()
            ->make(['date' => $faker->asciify(str_repeat('*', 1001))])
            ->toArray()
        )->assertSessionHasErrors('date');

        $this->assertCount(0, Timetable::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_round_to_database_with_passing_round_which_already_exists()
    {
        $round = 1;
        Timetable::factory()->create(['round' => $round]);

         $this->post('/admin/timetable', Timetable::factory()
            ->make(['round' => $round])
            ->toArray()
        )->assertRedirect('/admin/timetable/create')
         ->assertSessionHas('error');

        $this->assertCount(1, Timetable::all());
    }
}
