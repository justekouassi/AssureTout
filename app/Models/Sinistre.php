<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sinistre extends Model
{
	protected $table = 'sinistres';

	protected $fillable = [
		'date_declaration',
		'montant',
		'statut',
		'scan',
		'contestation',
		'transcription',
	];

	public $timestamps = false;

	public static function validate()
	{
		request()->validate([
			'date_declaration' => ['required'],
			'montant' => [],
			'statut' => ['required'],
			'scan' => [],
			'contestation' => [],
			'transcription' => ['required'],
		]);
	}
}
