<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmailIsVerifiedWithInput
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle(Request $request, Closure $next): Response
	{
		$usernameOrEmail = $request->input('username_email');
		$user = User::where('username', $usernameOrEmail)->orWhere('email', $usernameOrEmail)->first();

		if ($user && auth()->validate(['email' => $user->email, 'password' => $request->input('password')])) {
			if ($user instanceof MustVerifyEmail && !$user->hasVerifiedEmail()) {
				return redirect()->route('successes.registration');
			} else {
				auth()->login($user);
			}
		}
		return $next($request);
	}
}
