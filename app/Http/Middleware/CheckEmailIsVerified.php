<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmailIsVerified extends EnsureEmailIsVerified
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle($request, Closure $next, $redirectToRoute = null): Response
	{
		$userId = $request->route('userId');
		$user = $userId ? User::find($userId) : $request->user();

		if ($user instanceof MustVerifyEmail && !$user->hasVerifiedEmail()) {
			return $request->expectsJson()
				? abort(403, 'Your email address is not verified.')
				: redirect()->route($redirectToRoute ?: 'auth.login_page');
		}

		return $next($request);
	}
}
