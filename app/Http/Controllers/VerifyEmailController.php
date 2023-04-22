<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class VerifyEmailController extends Controller
{
	public function confirmation(User $userId): View
	{
		$userId->markEmailAsVerified();
		$userId->user_token = null;
		$userId->save();
		return view('auth.success-confirmation');
	}
}
