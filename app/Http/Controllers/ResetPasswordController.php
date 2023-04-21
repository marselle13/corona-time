<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\ResetPasswordRequest;
use App\Http\Requests\auth\UpdatePasswordRequest;
use App\Mail\ResetPasswordEmail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{
	public function reset(ResetPasswordRequest $request): RedirectResponse
	{
		$user = User::where('email', $request->validated())->first();
		Mail::to($user->email)->send(new ResetPasswordEmail($user));
		return redirect(route('auth.success_recover'));
	}

	public function updatePassword(UpdatePasswordRequest $request, User $userId): View
	{
		$userId->update($request->except('password_confirmation'));
		$userId->tokens()->delete();
		return view('auth.success-update');
	}
}
