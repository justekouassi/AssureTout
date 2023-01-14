<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifiedQuestion extends Mailable
{
	use Queueable, SerializesModels;

	public $user = [];
	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(array $user)
	{
		$this->user = $user;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->subject('Validation de contribution')
		->view('emails.verified_question');
	}
}
