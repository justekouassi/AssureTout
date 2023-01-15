<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
	protected $table = 'contrats';

	protected $fillable = [
		'date_creation',
		'date_debut',
		'date_fin',
		'prix',
		'statut',
		'type',
		'niveau',
		'option_contrat'
	];
}
