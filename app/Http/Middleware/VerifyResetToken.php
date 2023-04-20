<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyResetToken
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle(Request $request, Closure $next): Response
	{
		$user = User::where('user_token', $request->session()->get('user_token'))->where('id', $request->route('id'))->first();
		if (!$user || !$user->user_token) {
			return redirect()->route('auth.login_page');
		}
		return $next($request);
	}
}
