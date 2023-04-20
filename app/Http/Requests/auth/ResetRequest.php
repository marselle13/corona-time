<?php

namespace App\Http\Requests\auth;

use App\Rules\VerifiedEmail;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResetRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		return [
			'email' => ['required', 'email', Rule::exists('users', 'email'), new VerifiedEmail,
			],
		];
	}
}
