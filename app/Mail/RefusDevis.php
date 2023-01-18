<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RefusDevis extends Mailable
{
	use Queueable, SerializesModels;

	public $user = [];
	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(array $user = [])
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
		return $this->subject('Refus de devis')
			->view('emails.refus-devis');
	}
}