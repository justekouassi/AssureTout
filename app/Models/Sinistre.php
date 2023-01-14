<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Sinistre extends Model
{
	use HasApiTokens;

	protected $table = "sinistres";

	protected $fillable = [
		'date_declaration',
		'montant',
		'statut',
		'scan',
		'transcription',
	];

	public static function validate()
	{
		request()->validate([
			'date_declaration' => ['required'],
			'montant' => ['required'],
			'statut' => ['required'],
			'scan' => [],
			'transcription' => ['required'],
		]);
	}
}
