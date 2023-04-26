<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
	use RefreshDatabase;

	public function test_login_page_is_accessible(): void
	{
		$languages = ['en', 'ka'];

		foreach ($languages as $language) {
			app()->setLocale($language);
			$response = $this->get('/login');
			$response->assertSuccessful();
			$response->assertSee(trans('messages.welcome_login'));
			$response->assertViewIs('auth.login-page');
		}
	}

	public function test_unauthorized_user_should_redirect_to_login_page_if_tries_to_go_on_auth_page(): void
	{
		$response = $this->get('/worldwide');
		$response->assertRedirect('/login');
	}

	public function test_auth_should_give_us_errors_if_input_is_not_provided(): void
	{
		$response = $this->post('/login');
		$response->assertSessionHasErrors(['username_email', 'password']);
	}

	public function test_auth_should_give_us_errors_if_we_wont_provide_username_email_input(): void
	{
		$response = $this->post('/login', ['password' => 'password']);
		$response->assertSessionHasErrors(['username_email']);
		$response->assertSessionDoesntHaveErrors(['password']);
	}

	public function test_auth_should_give_us_errors_if_we_wont_provide_password_input(): void
	{
		$response = $this->post('/login', ['username_email' => 'example']);
		$response->assertSessionHasErrors(['password']);
		$response->assertSessionDoesntHaveErrors(['username_email']);
	}

	public function test_auth_should_give_us_incorrect_credentials_error_when_such_user_does_not_exists(): void
	{
		$response = $this->post('/login', ['username_email' => 'example@gmail.com', 'password' => 'password']);
		$response->assertSessionHasErrors(['login_error' => trans('messages.login_error')]);
	}

	public function test_auth_should_redirect_to_successfully_registration_page_if_user_is_not_verified(): void
	{
		$name = 'example';
		$email = 'example@gmail.com';
		$password = 'password';

		User::create(
			[
				'username'          => $name,
				'email'             => $email,
				'password'          => bcrypt($password),
			]
		);
		$response = $this->post('/login', [
			'username_email'    => $email,
			'password'          => $password,
		]);
		$response->assertRedirect('/register/success-registration/');
	}

	public function test_auth_should_redirect_to_worldwide_page_after_successfully_login_if_user_is_verified(): void
	{
		$name = 'example';
		$email = 'example@gmail.com';
		$password = 'password';

		User::create(
			[
				'username'          => $name,
				'email'             => $email,
				'password'          => bcrypt($password),
				'email_verified_at' => now(),
			]
		);
		$response = $this->post('/login', [
			'username_email'    => $email,
			'password'          => $password,
		]);
		$response->assertRedirect('/worldwide');
		$response = $this->post('/logout');
		$response->assertRedirect('/login');
	}
}
