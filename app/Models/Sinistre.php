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
		'scan_courrier',
		'scan_contestation',
		'id_utilisateur',
	];

	public $timestamps = false;

	public static function validate()
	{
		request()->validate([
			'date_declaration' => ['required'],
			'montant' => [],
			'scan_courrier' => [],
			'scan_contestation' => [],
		]);
	}
}
