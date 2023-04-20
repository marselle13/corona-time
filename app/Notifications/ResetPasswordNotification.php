<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends ResetPassword
{
	/**
	 * Get the mail representation of the notification.
	 */
	public function toMail($notifiable): MailMessage
	{
		return (new MailMessage)
			->subject(trans('messages.recover'))
			->markdown('auth.confirmation-recover', ['reset' => $notifiable->user_token]);
	}
}
