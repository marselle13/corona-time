<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\RegisterRequest;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Notification;

class AuthController extends Controller
{
	public function register(RegisterRequest $request, VerifyEmailNotification $verify): RedirectResponse
	{
		$user = User::create($request->except('password_confirmation'));
		$request->session()->put('remember_token', $request->remember_token);
		Notification::send($user, $verify);
		return redirect(route('auth.success_registration'));
	}

	public function confirmation(Request $request, string $token): View
	{
		$user = User::where('remember_token', $token)->firstOrFail();
		$user->markEmailAsVerified();
		$user->remember_token = null;
		$user->save();
		$request->session()->forget('remember_token');
		return view('auth.success-confirmation');
	}
}
