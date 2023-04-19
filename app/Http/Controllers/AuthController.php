<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\RegisterRequest;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;

class AuthController extends Controller
{
	public function register(RegisterRequest $request, VerifyEmailNotification $verify): RedirectResponse
	{
		$user = User::create($request->except('password_confirmation'));
		Notification::send($user, $verify);
		return redirect(route('auth.success_registration', $user->id));
	}

	public function confirmation(string $token): View
	{
		$user = User::where('verify_token', $token)->firstOrFail();
		$user->markEmailAsVerified();
		$user->verify_token = null;
		$user->save();
		return view('auth.success-confirmation');
	}
}
