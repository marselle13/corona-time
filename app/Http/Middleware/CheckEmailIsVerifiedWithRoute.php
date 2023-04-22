<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmailIsVerifiedWithRoute extends EnsureEmailIsVerified
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle($request, Closure $next, $redirectToRoute = null): Response
	{
		$userId = $request->route('user');
		$user = $userId ? User::find($userId) : $request->user();
		if ($user instanceof MustVerifyEmail && !$user->hasVerifiedEmail()) {
			return redirect()->route($redirectToRoute ?: 'auth.login_page');
		}

		return $next($request);
	}
}
