<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VerifyEmailController extends Controller
{
	public function confirmation(Request $request, string $token): View
	{
		$user = User::where('user_token', $token)->firstOrFail();
		$user->markEmailAsVerified();
		$user->user_token = null;
		$user->save();
		$request->session()->forget('user_token');
		return view('auth.success-confirmation');
	}
}
