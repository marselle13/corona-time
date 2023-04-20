<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\RegisterRequest;
use App\Http\Requests\auth\ResetRequest;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;

class AuthController extends Controller
{
	public function register(RegisterRequest $request, VerifyEmailNotification $verify): RedirectResponse
	{
		$user = User::create($request->except('password_confirmation'));
		$request->session()->put('user_token', $request->user_token);
		Notification::send($user, $verify);
		return redirect(route('auth.success_registration', $user->id));
	}

	public function confirmation(Request $request, string $token): View
	{
		$user = User::where('user_token', $token)->firstOrFail();
		$user->markEmailAsVerified();
		$user->user_token = null;
		$user->save();
		$request->session()->forget('user_token');
		return view('auth.success-confirmation');
	}

	public function login(LoginRequest $request): RedirectResponse
	{
		$user = User::where('username', $request->username_email)
		->orWhere('email', $request->username_email)->first();
		$credentials['email'] = $user?->email;
		$credentials['password'] = $request->password;
		if (!auth()->attempt($credentials, $request->remember)) {
			return back()->withErrors(['login_error' => trans('messages.login_error')]);
		}
		return redirect()->route('landing.worldwide');
	}

	public function reset(ResetRequest $request)
	{
	}
}
