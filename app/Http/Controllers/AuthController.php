<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\RegisterRequest;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Notification;

class AuthController extends Controller
{
	public function register(RegisterRequest $request, VerifyEmailNotification $verify): RedirectResponse
	{
		$user = User::create($request->except('password_confirmation'));
		$request->session()->put('user_token', $request->user_token);
		Notification::send($user, $verify);
		return redirect(route('auth.success_registration', $user->id));
	}

	public function login(LoginRequest $request): RedirectResponse
	{
		$user = User::where('username', $request->username_email)
		->orWhere('email', $request->username_email)->first();
		$credentials['email'] = $user?->email;
		$credentials['password'] = $request->password;
		if (!$user->email_verified_at) {
			return redirect(route('auth.success_registration', $user->id));
		} elseif (!auth()->attempt($credentials, $request->remember)) {
			return back()->withErrors(['login_error' => trans('messages.login_error')]);
		}
		return redirect(route('landing.worldwide'));
	}

	public function logout()
	{
		auth()->logout();
		return redirect()->route('auth.login_page');
	}
}
