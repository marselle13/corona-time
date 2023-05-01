<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
	use RefreshDatabase;

	protected User $user;

	protected function setUp(): void
	{
		parent::setUp();

		$this->user = User::factory()->create();
	}

	public function test_unauthorized_user_should_redirect_to_login_page_if_visits_on_worldwide_page(): void
	{
		$response = $this->get(route('landings.worldwide'));
		$response->assertRedirect(route('auth.login_page'));
	}

	public function test_redirect_to_worldwide_page_if_authorized_user_visits_login_page(): void
	{
		$response = $this->actingAs($this->user)->get(route('auth.login_page'));
		$response->assertRedirect('/');
	}

	public function test_worldwide_page_is_accessible(): void
	{
		$response = $this->actingAs($this->user)->get(route('landings.worldwide'));
		$response->assertSuccessful();
		$response->assertSee(trans('messages.world_statistic'));
		$response->assertViewIs('landing.worldwide');
	}

	public function test_country_page_is_accessible(): void
	{
		$response = $this->actingAs($this->user)->get(route('landings.country'));
		$response->assertSuccessful();
		$response->assertSee(trans('messages.country_statistic'));
		$response->assertViewIs('landing.country');
	}
}
