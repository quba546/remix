<?php

namespace Tests\Feature;

use App\Models\Player;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Faker\Factory as Faker;

class PlayersTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @test
     */
    public function can_moderator_add_player_to_database_with_valid_data()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $this->post('/admin/players', $this->fakePlayerData())
            ->assertSessionHas('success')
            ->assertRedirect('/admin/players');

        $this->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_player_to_database_without_passing_first_name()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));
        $this->post('/admin/players', array_merge($this->fakePlayerData(), ['first_name' => null]))
            ->assertSessionHasErrors('first_name');

        $this->assertCount(0, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_player_to_database_with_passing_more_than_50_characters_to_first_name()
    {
        $faker = Faker::create();
        $this->actingAs(User::factory()->create(['role_id' => 1]));
        $this->post('/admin/players', array_merge($this->fakePlayerData(), ['first_name' => $faker->asciify(str_repeat('*', 51))]))
            ->assertSessionHasErrors('first_name');

        $this->assertCount(0, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_player_to_database_with_passing_numbers_to_first_name()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));
        $this->post('/admin/players', array_merge($this->fakePlayerData(), ['first_name' => 1]))
            ->assertSessionHasErrors('first_name');

        $this->assertCount(0, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_player_to_database_without_passing_last_name()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));
        $this->post('/admin/players', array_merge($this->fakePlayerData(), ['last_name' => null]))
            ->assertSessionHasErrors('last_name');

        $this->assertCount(0, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_player_to_database_with_passing_more_than_50_characters_to_last_name()
    {
        $faker = Faker::create();
        $this->actingAs(User::factory()->create(['role_id' => 1]));
        $this->post('/admin/players', array_merge($this->fakePlayerData(), ['last_name' => $faker->asciify(str_repeat('*', 51))]))
            ->assertSessionHasErrors('last_name');

        $this->assertCount(0, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_player_to_database_with_passing_numbers_to_last_name()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));
        $this->post('/admin/players', array_merge($this->fakePlayerData(), ['last_name' => 1]))
            ->assertSessionHasErrors('last_name');

        $this->assertCount(0, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_player_to_database_without_passing_position()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));
        $this->post('/admin/players', array_merge($this->fakePlayerData(), ['position' => null]))
            ->assertSessionHasErrors('position');

        $this->assertCount(0, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_player_to_database_without_passing_specified_string()
    {
        $faker = Faker::create();
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $this->post('/admin/players', array_merge($this->fakePlayerData(), ['position' => $faker->text(50)]))
            ->assertSessionHasErrors('position');

        $this->assertCount(0, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_player_to_database_without_passing_nr_as_an_integer()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $this->post('/admin/players', array_merge($this->fakePlayerData(), ['nr' => 3.1415]))
            ->assertSessionHasErrors('nr');

        $this->assertCount(0, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_player_to_database_with_passing_nr_less_than_1()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $this->post('/admin/players', array_merge($this->fakePlayerData(), ['nr' => 0]))
            ->assertSessionHasErrors('nr');

        $this->assertCount(0, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_add_player_to_database_with_passing_nr_greater_than_99()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $this->post('/admin/players', array_merge($this->fakePlayerData(), ['nr' => 100]))
            ->assertSessionHasErrors('nr');

        $this->assertCount(0, Player::all());
    }

    /**
     * @test
     */
    public function can_moderator_update_player_played_matches_with_passing_valid_data()
    {
        $faker = Faker::create();

        $this->actingAs(User::factory()->create(['role_id' => 1]));
        $id = 1;
        Player::factory()->create(['id' => $id]);
        $playedMatches = $faker->numberBetween(1, 38);

        $this->put('/admin/players',
            [
                'playerId' => $id,
                'played_matches' => $playedMatches
            ]
        )->assertRedirect('/admin/players');

        $this->assertDatabaseHas('players',
            [
                'id' => $id,
                'played_matches' => $playedMatches
            ]
        )->assertCount(1, Player::all());
    }

    // player details page

    /**
     * @test
     */
    public function can_moderator_update_player_details_with_valid_data()
    {
        $faker = Faker::create();
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $first_name = $faker->firstName;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'first_name' => $first_name])->toArray())
            ->assertRedirect('admin/players/' . $id .'/edit');

        $this->assertDatabaseHas('players', ['id' => $id, 'first_name' => $first_name])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_without_passing_first_name()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $firstName = null;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'first_name' => $firstName])->toArray())
            ->assertSessionHasErrors('first_name');

        $this->assertDatabaseMissing('players', ['id' => $id, 'first_name' => $firstName])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_with_passing_numbers_to_first_name()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $firstName = 1;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'first_name' => $firstName])->toArray())
            ->assertSessionHasErrors('first_name');

        $this->assertDatabaseMissing('players', ['id' => $id, 'first_name' => $firstName])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_with_passing_more_than_50_characters_to_first_name()
    {
        $faker = Faker::create();
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $firstName = $faker->asciify(str_repeat('*', 51));
        Player::factory()->create(['id' => $id]);

        $this->put(
            '/admin/players/' . $id,
            Player::factory()
                ->make(['id' => $id, 'first_name' => $firstName])
                ->toArray()
        )->assertSessionHasErrors('first_name');

        $this->assertDatabaseMissing('players', ['id' => $id, 'first_name' => $firstName])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_without_passing_last_name()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $lastName = null;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'last_name' => $lastName])->toArray())
            ->assertSessionHasErrors('last_name');

        $this->assertDatabaseMissing('players', ['id' => $id, 'last_name' => $lastName])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_with_passing_numbers_to_last_name()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $lastName = 1;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'last_name' => $lastName])->toArray())
            ->assertSessionHasErrors('last_name');

        $this->assertDatabaseMissing('players', ['id' => $id, 'last_name' => $lastName])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_with_passing_more_than_50_characters_to_last_name()
    {
        $faker = Faker::create();
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $lastName = $faker->asciify(str_repeat('*', 51));
        Player::factory()->create(['id' => $id]);

        $this->put(
            '/admin/players/' . $id,
            Player::factory()
                ->make(['id' => $id, 'last_name' => $lastName])
                ->toArray()
        )->assertSessionHasErrors('last_name');

        $this->assertDatabaseMissing('players', ['id' => $id, 'last_name' => $lastName])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_without_passing_position()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $position = null;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'position' => $position])->toArray())
            ->assertSessionHasErrors('position');

        $this->assertDatabaseMissing('players', ['id' => $id, 'position' => $position])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_without_passing_specific_string_as_position()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $position = 'abc';
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'position' => $position])->toArray())
            ->assertSessionHasErrors('position');

        $this->assertDatabaseMissing('players', ['id' => $id, 'position' => $position])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_without_passing_nr_as_an_integer()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $nr = 3.1415;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'nr' => $nr])->toArray())
            ->assertSessionHasErrors('nr');

        $this->assertDatabaseMissing('players', ['id' => $id, 'nr' => $nr])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_with_passing_nr_less_than_1()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $nr = 0;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'nr' => $nr])->toArray())
            ->assertSessionHasErrors('nr');

        $this->assertDatabaseMissing('players', ['id' => $id, 'nr' => $nr])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_with_passing_nr_greater_than_99()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $nr = 100;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'nr' => $nr])->toArray())
            ->assertSessionHasErrors('nr');

        $this->assertDatabaseMissing('players', ['id' => $id, 'nr' => $nr])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_without_passing_played_matches_as_an_integer()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $playedMatches = 3.1415;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'played_matches' => $playedMatches])->toArray())
            ->assertSessionHasErrors('played_matches');

        $this->assertDatabaseMissing('players', ['id' => $id, 'played_matches' => $playedMatches])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_with_passing_played_matches_less_than_0()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $playedMatches = -1;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'played_matches' => $playedMatches])->toArray())
            ->assertSessionHasErrors('played_matches');

        $this->assertDatabaseMissing('players', ['id' => $id, 'played_matches' => $playedMatches])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_without_passing_goals_as_an_integer()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $goals = 3.1415;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'goals' => $goals])->toArray())
            ->assertSessionHasErrors('goals');

        $this->assertDatabaseMissing('players', ['id' => $id, 'goals' => $goals])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_with_passing_goals_less_than_0()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $goals = -1;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'goals' => $goals])->toArray())
            ->assertSessionHasErrors('goals');

        $this->assertDatabaseMissing('players', ['id' => $id, 'goals' => $goals])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_without_passing_assists_as_an_integer()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $assists = 3.1415;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'assists' => $assists])->toArray())
            ->assertSessionHasErrors('assists');

        $this->assertDatabaseMissing('players', ['id' => $id, 'assists' => $assists])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_with_passing_assists_less_than_0()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $assists = -1;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'assists' => $assists])->toArray())
            ->assertSessionHasErrors('assists');

        $this->assertDatabaseMissing('players', ['id' => $id, 'assists' => $assists])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_without_passing_yellow_cards_as_an_integer()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $yellowCards = 3.1415;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'yellow_cards' => $yellowCards])->toArray())
            ->assertSessionHasErrors('yellow_cards');

        $this->assertDatabaseMissing('players', ['id' => $id, 'yellow_cards' => $yellowCards])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_with_passing_yellow_cards_less_than_0()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $yellowCards = -1;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'yellow_cards' => $yellowCards])->toArray())
            ->assertSessionHasErrors('yellow_cards');

        $this->assertDatabaseMissing('players', ['id' => $id, 'yellow_cards' => $yellowCards])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_without_passing_red_cards_as_an_integer()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $redCards = 3.1415;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'red_cards' => $redCards])->toArray())
            ->assertSessionHasErrors('red_cards');

        $this->assertDatabaseMissing('players', ['id' => $id, 'red_cards' => $redCards])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_with_passing_red_cards_less_than_0()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $redCards = -1;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'red_cards' => $redCards])->toArray())
            ->assertSessionHasErrors('red_cards');

        $this->assertDatabaseMissing('players', ['id' => $id, 'red_cards' => $redCards])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_without_passing_clean_sheets_as_an_integer()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $cleanSheets = 3.1415;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'clean_sheets' => $cleanSheets])->toArray())
            ->assertSessionHasErrors('clean_sheets');

        $this->assertDatabaseMissing('players', ['id' => $id, 'clean_sheets' => $cleanSheets])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function cannot_moderator_update_player_details_with_passing_clean_sheets_less_than_0()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        $cleanSheets = -1;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'clean_sheets' => $cleanSheets])->toArray())
            ->assertSessionHasErrors('clean_sheets');

        $this->assertDatabaseMissing('players', ['id' => $id, 'clean_sheets' => $cleanSheets])
            ->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function can_moderator_upload_photo_for_player_if_photo_is_valid()
    {
        $faker = Faker::create();
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $this->post('/admin/players/upload', ['playerImage' => $faker->image()])->assertOk();
    }

    /**
     * @test
     */
    public function can_moderator_restore_default_values_for_player_details()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        Player::factory()->create(['id' => $id]);

        $this->put('/admin/players/' . $id . '/restore', Player::factory()
            ->make(
                [
                    'id' => $id,
                    'goals' => 0,
                    'assists' => 0,
                    'played_matches' => 0,
                    'clean_sheets' => 0,
                    'yellow_cards' => 0,
                    'red_cards' => 0
                ])->toArray())
            ->assertSessionHas('info')
            ->assertRedirect('admin/players/' . $id . '/edit');

        $this->assertDatabaseHas(
            'players',
            [
                'id' => $id,
                'goals' => 0,
                'assists' => 0,
                'played_matches' => 0,
                'clean_sheets' => 0,
                'yellow_cards' => 0,
                'red_cards' => 0
            ]
        )->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    // TODO complicated test
//    public function can_moderator_remove_player_image_from_player_details()
//    {
//        $faker = Faker::create();
//        $this->actingAs(User::factory()->create(['role_id' => 1]));
//        Storage::fake('public');
//
//        $id = 2;
//        $image = null;
//        $imagePath = 'players-images/' . UploadedFile::fake()->image('image1.png');
//        Player::factory()->create(['id' => $id, 'image' => $imageUrl]);
//
//        $this->put('/admin/players/' . $id, Player::factory()->make(['id' => $id, 'image' => $image])->toArray())
//            ->assertSessionHas('success')
//            ->assertRedirect('admin/players/' . $id . '/edit');
//
////        $this->assertDatabaseHas('players', ['id' => $id, 'image' => $image])
////            ->assertCount(1, Player::all());
//    }

    /**
     * @test
     */
    public function cannot_moderator_remove_player_from_database()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 2;
        Player::factory()->create(['id' => $id]);

        $this->delete('/admin/players/' . $id, Player::factory()->make(['id' => $id])->toArray())
            ->assertStatus(403);

        $this->assertCount(1, Player::all());
    }

    /**
     * @test
     */
    public function can_admin_remove_player_from_database()
    {
        $this->actingAs(User::factory()->create(['role_id' => 0]));

        $id = 2;
        Player::factory()->create(['id' => $id]);

        $this->delete('/admin/players/' . $id, Player::factory()->make(['id' => $id])->toArray())
            ->assertRedirect('/admin/players')
            ->assertSessionHas('warning');

        $this->assertCount(0, Player::all());
    }

    private function fakePlayerData(): array
    {
        $faker = Faker::create();

        return [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'nr' => $faker->randomElement([null, $faker->numberBetween(1, 99)]),
            'position' => $faker->randomElement(['bramkarz', 'obrońca', 'pomocnik', 'napastnik']),
        ];
    }
}
