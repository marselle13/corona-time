<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\ResetRequest;
use App\Http\Requests\auth\UpdateRequest;
use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{
	public function reset(ResetRequest $request): RedirectResponse
	{
		$user = User::where('email', $request->validated())->first();
		$user->user_token = Str::random(60);
		$user->save();
		$request->session()->put('user_token', $user->user_token);
		Notification::send($user, new ResetPasswordNotification($user->user_token));
		return redirect(route('auth.success_recover', $user->id));
	}

	public function newPassword(string $token): View
	{
		return view('auth.new-password', ['token' => $token]);
	}

	public function updatePassword(UpdateRequest $request, string $token): View
	{
		$user = User::where('user_token', $token)->firstOrFail();
		$user->update($request->except('password_confirmation'));
		$user->user_token = null;
		$user->save();
		$request->session()->forget('user_token');
		return view('auth.success-update');
	}
}
