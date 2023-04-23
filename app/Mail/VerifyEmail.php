<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class VerifyEmail extends Mailable
{
	use Queueable, SerializesModels;

	/**
	 * Create a new message instance.
	 */
	public function __construct(protected User $user)
	{
	}

	public function build()
	{
		$this->generateVerifyToken($this->user);

		return $this->subject(trans('messages.verify'))
			->view('email.confirmation')
			->with([
				'verify' => $this->user->user_token,
				'user'   => $this->user,
			]);
	}

	private function generateVerifyToken(User $user): void
	{
		$user->user_token = Str::random(40);
		$user->save();
	}
}
