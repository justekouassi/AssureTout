<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportedSinistre extends Mailable
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
		return $this->subject('Signalement de question')
		->view('emails.reported_question');
		// ->attach('images/jkwiz-noir.png');
	}
}
