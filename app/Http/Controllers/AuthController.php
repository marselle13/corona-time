<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\RegisterRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
	public function register(RegisterRequest $request): RedirectResponse
	{
		$user = User::create($request->except('password_confirmation'));
		Mail::to($user->email)->send(new VerifyEmail($user));
		return redirect(route('auth.success_registration'));
	}

	public function login(LoginRequest $request): RedirectResponse
	{
		$user = User::where('username', $request->username_email)
		->orWhere('email', $request->username_email)->first();
		$credentials['email'] = $user?->email;
		$credentials['password'] = $request->password;
		if (!auth()->attempt($credentials, $request->remember)) {
			return back()->withErrors(['login_error' => trans('messages.login_error')]);
		} elseif (auth()->attempt($credentials, $request->remember) && !$user->email_verified_at) {
			auth()->logout();
			return redirect(route('auth.success_registration'));
		}
		return redirect(route('landing.worldwide'));
	}

	public function logout()
	{
		auth()->logout();
		return redirect()->route('auth.login_page');
	}
}
