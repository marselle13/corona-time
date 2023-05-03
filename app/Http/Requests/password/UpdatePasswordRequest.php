<?php

namespace App\Http\Requests\password;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		return [
			'_token'                     => 'required',
			'password'                   => 'required|min:3|confirmed',
			'password_confirmation'      => 'required',
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
			'password'                  => trans('messages.new_password'),
			'password_confirmation'     => 'Repeat Password',
		];
	}

	protected function passedValidation()
	{
		$this->merge([
			'password'       => bcrypt($this->password),
		]);
	}
}
