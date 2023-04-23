<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class VerifyEmailController extends Controller
{
	public function confirmation(User $user): View
	{
		$user->markEmailAsVerified();
		$user->user_token = null;
		$user->save();
		return view('success.confirmation');
	}
}
