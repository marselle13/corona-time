<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\RegisterAuthRequest;
use App\Models\User;

class AuthController extends Controller
{
	public function register(RegisterAuthRequest $request)
	{
		User::create($request->except('password_confirmation'));
		return redirect(route('auth.success_registration'));
	}
}
