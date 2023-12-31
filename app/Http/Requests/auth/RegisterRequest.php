<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class RegisterRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		return [
			'username'              => 'required|min:3|unique:users,username',
			'email'                 => 'required|email|unique:users,email',
			'password'              => 'required|min:3|confirmed',
		];
	}

	/**
	 * Get custom attributes for validator errors.
	 *
	 * @return array<string, string>
	 */
	public function attributes(): array
	{
		return [
			'username' => trans('messages.username'),
			'email'    => trans('messages.email'),
			'password' => trans('messages.password'),
		];
	}

	protected function passedValidation()
	{
		$this->merge([
			'password'       => bcrypt($this->password),
			'user_token'     => Str::random(60),
		]);
	}
}
