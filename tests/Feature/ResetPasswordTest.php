<?php

namespace Tests\Feature;

use App\Mail\ResetPasswordEmail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
	use RefreshDatabase;

	public function test_reset_password_page_is_accessible(): void
	{
		$languages = ['en', 'ka'];

		foreach ($languages as $language) {
			app()->setLocale($language);
			$response = $this->get(route('passwords.reset_page'));
			$response->assertSuccessful();
			$response->assertSee(trans('messages.reset_password'));
			$response->assertViewIs('password.reset');
		}
	}

	public function test_password_reset_should_give_us_errors_if_input_is_not_provided(): void
	{
		$response = $this->post(route('passwords.reset'));
		$response->assertSessionHasErrors('email');
	}

	public function test_password_reset_should_give_us_errors_if_email_is_not_verified(): void
	{
		$user = User::factory()->create(['email_verified_at' => null]);
		$response = $this->post(route('passwords.reset'), ['email' => $user->email]);
		$response->assertSessionHasErrors('email');
	}

	public function test_password_reset_should_redirect_to_success_password_reset_page_and_sand_password_recover_email()
	{
		$user = User::factory()->create();
		$response = $this->post(route('passwords.reset'), ['email' => $user->email]);
		$response->assertRedirect(route('successes.password_recover'));

		Mail::fake();
		Mail::to($user->email)->send(new ResetPasswordEmail($user));
		Mail::assertSent(ResetPasswordEmail::class, fn (ResetPasswordEmail $mail) => $mail->hasTo($user->email));
	}

	public function test_verify_recover_password_with_email_confirmation_link_and_give_us_error_if_input_is_not_provided(): void
	{
		$user = User::factory()->create([
			'user_token' => Str::random(40),
		]);
		$recoverUrl = URL::route('passwords.update_page', ['user' => $user, 'token' => $user->user_token]);
		$response = $this->get($recoverUrl);
		$response->assertViewIs('password.update-page');
		$response = $this->patch(route('passwords.update_page', ['user' => $user, 'token' => $user->user_token]));
		$response->assertSessionHasErrors(['password']);
	}

	public function test_verify_recover_password_with_email_confirmation_link_and_give_us_error_if_input_password_is_not_match(): void
	{
		$user = User::factory()->create([
			'user_token' => Str::random(40),
		]);
		$recoverUrl = URL::route('passwords.update_page', ['user' => $user, 'token' => $user->user_token]);
		$response = $this->get($recoverUrl);
		$response->assertViewIs('password.update-page');
		$response = $this->patch(route('passwords.update_page', ['user' => $user, 'token' => $user->user_token]), ['password'=> 'example', 'password_confirmation' => 'example1']);
		$response->assertSessionHasErrors(['password']);
	}

	public function test_verify_recover_password_with_email_confirmation_link_and_give_us_success_update_password_page(): void
	{
		$password = 'example';
		$user = User::factory()->create([
			'user_token' => Str::random(40),
		]);
		$recoverUrl = URL::route('passwords.update_page', ['user' => $user, 'token' => $user->user_token]);
		$response = $this->get($recoverUrl);
		$response->assertViewIs('password.update-page');
		$response = $this->patch(route('passwords.update_page', ['user' => $user, 'token' => $user->user_token]), ['password'=>  $password, 'password_confirmation' =>  $password]);
		$response->assertViewIs('success.password-update');
		$response = $this->get($recoverUrl);
		$response->assertRedirect(route('auth.login_page'));
	}
}
