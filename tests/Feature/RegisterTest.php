<?php

namespace Tests\Feature;

use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Tests\TestCase;

class RegisterTest extends TestCase
{
	use RefreshDatabase;

	public function test_register_page_is_accessible(): void
	{
		$languages = ['en', 'ka'];

		foreach ($languages as $language) {
			app()->setLocale($language);
			$response = $this->get('/register');
			$response->assertSuccessful();
			$response->assertSee(trans('messages.welcome_register'));
			$response->assertViewIs('auth.register-page');
		}
	}

	public function test_register_page_should_give_us_errors_if_inputs_is_not_provided(): void
	{
		$response = $this->post('/register');
		$response->assertSessionHasErrors(['username', 'email', 'password', 'password_confirmation']);
	}

	public function test_register_page_should_give_us_errors_if_username_and_email_exists(): void
	{
		$username = 'example';
		$email = 'example@gmail.com';
		$password = 'password';

		User::create(
			[
				'username'          => $username,
				'email'             => $email,
				'password'          => bcrypt($password),
			]
		);

		$response = $this->post('/register', [
			'username'              => $username,
			'email'                 => $email,
			'password'              => $password,
			'password_confirmation' => $password,
		]);
		$response->assertSessionHasErrors(['username', 'email']);
	}

	public function test_register_page_should_give_us_errors_if_password_does_not_match_repeat_password(): void
	{
		$username = 'example';
		$email = 'example@gmail.com';
		$password = 'password';

		$response = $this->post('/register', [
			'username'              => $username,
			'email'                 => $email,
			'password'              => $password,
			'password_confirmation' => 'example1',
		]);
		$response->assertSessionHasErrors(['password']);
	}

	public function test_register_page_should_redirect_to_successfully_register_page_and_send_email_verification_link(): void
	{
		$username = 'example';
		$email = 'example@gmail.com';
		$password = 'password';

		$response = $this->post(route('auth.register'), [
			'username'              => $username,
			'email'                 => $email,
			'password'              => $password,
			'password_confirmation' => $password,
		]);

		$response->assertRedirect(route('successes.registration'));

		$user = User::where('email', $email)->first();

		$token = Str::random(60);
		$user->user_token = $token;
		$user->save();

		Mail::to($user->email)->send(new VerifyEmail($user));
	}

	public function test_verify_user_with_email_confirmation_link(): void
	{
		$user = User::factory()->create([
			'user_token'        => Str::random(40),
			'email_verified_at' => null,
		]);

		$verificationUrl = URL::route('emails.confirmation', ['user' => $user, 'token' => $user->user_token]);
		$response = $this->get($verificationUrl);

		$response->assertViewIs('success.confirmation');
		$response = $this->get($verificationUrl);
		$response->assertRedirect(route('auth.login'));

		$this->assertNotNull($user->fresh()->email_verified_at);
	}
}
