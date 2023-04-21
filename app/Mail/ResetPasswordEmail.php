<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordEmail extends Mailable
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
		return $this->subject(trans('messages.recover'))
			->view('auth.confirmation-recover')
			->with([
				'reset' => $this->user->createToken('reset-token')->plainTextToken,
				'user'  => $this->user->id]);
	}
}
