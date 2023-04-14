<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\RegisterAuthRequest;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthController extends Controller
{
	public function register(RegisterAuthRequest $request, VerifyEmailNotification $verify): RedirectResponse
	{
		$user = User::create($request->except('password_confirmation', 'remember'));
		auth()->login($user);
		$user->notify($verify);
		return redirect(route('auth.success_registration'));
	}

	public function confirmation(EmailVerificationRequest $request): View
	{
		$request->fulfill();
		auth()->logout();
		return view('auth.success-confirmation');
	}
}
