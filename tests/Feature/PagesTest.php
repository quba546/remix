<?php

namespace Tests\Feature;

use App\Models\Player;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesTest extends TestCase
{
    use RefreshDatabase;

    /* Anonymous user */

    /**
     * @test
     */
    public function can_anonymous_user_get_home_page()
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function can_anonymous_user_get_about_page()
    {
        $response = $this->get('/about');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function can_anonymous_user_get_contact_page()
    {
        $response = $this->get('/contact');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function can_anonymous_user_get_timetable_page()
    {
        $response = $this->get('/season/timetable');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function can_anonymous_user_get_standings_page()
    {
        $response = $this->get('/season/standings');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function can_anonymous_user_get_players_page()
    {
        $response = $this->get('/season/players');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function can_anonymous_user_get_players_stats_page()
    {
        $response = $this->get('/season/players/stats');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function cannot_anonymous_user_get_players_details_page_if_player_doesnt_exist()
    {
        $ids = [1, 'abc', null];
        foreach ($ids as $id) {
            $response = $this->get('/season/players/{id}' . $id);

            $response->assertNotFound();
        }
    }

    /**
     * @test
     */
    public function can_anonymous_user_get_players_details_page_if_player_exists()
    {
        $id = 1;

        Player::factory()->create([
            'id' => $id
        ]);

        $response = $this->get('/season/players/' . $id);

        $response->assertOk();
    }

    /**
     * @test
     */
    public function can_anonymous_user_get_login_page()
    {
        $response = $this->get('/login');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function can_anonymous_user_get_registration_page()
    {
        $response = $this->get('/register');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function can_anonymous_user_get_privacy_policy_page()
    {
        $response = $this->get('/privacy-policy');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function can_anonymous_user_get_gallery_page()
    {
        $response = $this->get('/gallery');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function redirect_anonymous_user_to_login_page_when_gets_dashboard_page()
    {
        $response = $this->get('/admin');

        $response->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function redirect_anonymous_user_to_login_page_when_gets_add_round_page()
    {
        $response = $this->get('/admin/timetable/create');

        $response->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function redirect_anonymous_user_to_login_page_when_gets_remove_round_page()
    {
        $response = $this->get('/admin/timetable/edit');

        $response->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function redirect_anonymous_user_to_login_page_when_gets_last_match_page()
    {
        $response = $this->get('/admin/matches/last/edit');

        $response->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function redirect_anonymous_user_to_login_page_when_gets_upcoming_match_page()
    {
        $response = $this->get('/admin/matches/upcoming/edit');

        $response->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function redirect_anonymous_user_to_login_page_when_gets_add_standings_page()
    {
        $response = $this->get('/admin/standing/create');

        $response->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function redirect_anonymous_user_to_login_page_when_gets_admin_players_list_page()
    {
        $response = $this->get('/admin/players');

        $response->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function redirect_anonymous_user_to_login_page_when_gets_admin_player_details_page_if_player_exists()
    {
        $id = 1;

        Player::factory()->create([
            'id' => $id
        ]);

        $response = $this->get('/admin/players/' . $id . '/edit');

        $response->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function redirect_anonymous_user_to_login_page_when_gets_admin_player_details_page_if_player_doesnt_exist()
    {
        $id = 1;

        $response = $this->get('/admin/players/' . $id . '/edit');

        $response->assertRedirect('/login');
    }

    /* Logged in user */

    /**
     * @test
     */
    public function can_logged_in_user_get_dashboard_page()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get('/admin');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function cannot_logged_in_user_get_add_round_page()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get('/admin/timetable/create');
        $response->assertStatus(403);
    }

    /**
     * @test
     */
    public function cannot_logged_in_user_get_remove_round_page()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get('/admin/timetable/edit');
        $response->assertStatus(403);
    }

    /**
     * @test
     */
    public function cannot_logged_in_user_get_last_match_page()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get('/admin/matches/last/edit');
        $response->assertStatus(403);
    }

    /**
     * @test
     */
    public function cannot_logged_in_user_get_upcoming_match_page()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get('/admin/matches/upcoming/edit');
        $response->assertStatus(403);
    }

    /**
     * @test
     */
    public function cannot_logged_in_user_get_add_standings_page()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get('/admin/standing/create');
        $response->assertStatus(403);
    }

    /**
     * @test
     */
    public function cannot_logged_in_user_get_admin_players_list_page()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get('/admin/players');
        $response->assertStatus(403);
    }

    /**
     * @test
     */
    public function cannot_logged_in_user_get_admin_player_details_page_if_player_exists()
    {
        $this->actingAs(User::factory()->create());

        $id = 1;

        Player::factory()->create([
            'id' => $id
        ]);

        $response = $this->get('/admin/players/' . $id . '/edit');
        $response->assertStatus(403);
    }

    /**
     * @test
     */
    public function cannot_logged_in_user_get_admin_player_details_page_if_player_doesnt_exist()
    {
        $this->actingAs(User::factory()->create());
        $id = 1;

        $response = $this->get('/admin/players/' . $id . '/edit');
        $response->assertStatus(403);
    }

    /* Admin */

    /**
     * @test
     */
    public function can_moderator_get_add_round_page()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));
        $response = $this->get('/admin/timetable/create');
        $response->assertOk();
    }

    /**
     * @test
     */
    public function can_moderator_get_remove_round_page()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));
        $response = $this->get('/admin/timetable/edit');
        $response->assertOk();
    }

    /**
     * @test
     */
    public function can_moderator_get_last_match_page()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));
        $response = $this->get('/admin/matches/last/edit');
        $response->assertOk();
    }

    /**
     * @test
     */
    public function can_moderator_get_upcoming_match_page()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));
        $response = $this->get('/admin/matches/upcoming/edit');
        $response->assertOk();
    }

    /**
     * @test
     */
    public function can_moderator_get_add_standings_page()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));
        $response = $this->get('/admin/standing/create');
        $response->assertOk();
    }

    /**
     * @test
     */
    public function can_moderator_get_admin_players_list_page()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));
        $response = $this->get('/admin/players');
        $response->assertOk();
    }

    /**
     * @test
     */
    public function can_moderator_get_admin_player_details_page_if_player_exists()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $id = 1;

        Player::factory()->create([
            'id' => $id
        ]);

        $response = $this->get('/admin/players/' . $id . '/edit');
        $response->assertOk();
    }

    /**
     * @test
     */
    public function cannot_moderator_get_admin_player_details_page_if_player_doesnt_exist()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));
        $id = 1;

        $response = $this->get('/admin/players/' . $id . '/edit');
        $response->assertNotFound();
    }

    /**
     * @test
     */
    public function can_moderator_get_admin_player_gallery_page()
    {
        $this->actingAs(User::factory()->create(['role_id' => 1]));

        $response = $this->get('/admin/photos/create');

        $response->assertOk();
    }
}
