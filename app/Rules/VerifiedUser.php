<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class VerifiedUser implements ValidationRule
{
	/**
	 * Run the validation rule.
	 *
	 * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
	 */
	public function validate(string $attribute, mixed $value, Closure $fail): void
	{
		$user = User::where('email', $value)
			->orWhere('username', $value)
			->first();

		if (!$user || !$user->email_verified_at) {
			$fail(trans('messages.no_verify'));
		}
	}
}
