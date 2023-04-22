<?php

namespace App\Http\Controllers;

use App\Http\Requests\password\ResetPasswordRequest;
use App\Http\Requests\password\UpdatePasswordRequest;
use App\Mail\ResetPasswordEmail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{
	public function resetPassword(ResetPasswordRequest $request): RedirectResponse
	{
		$user = User::where('email', $request->validated())->first();
		Mail::to($user->email)->send(new ResetPasswordEmail($user));
		return redirect(route('successes.password_recover'));
	}

	public function updatePassword(UpdatePasswordRequest $request, User $user): View
	{
		$user->update($request->except('password_confirmation'));
		$user->user_token = null;
		$user->save();
		return view('success.password-update');
	}
}
