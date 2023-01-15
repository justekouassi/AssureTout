<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContratHabitation extends Model
{
	protected $table = 'contrats_habitation';

	protected $fillable = [
		'id_contrat',
		'type',
		'adresse',
		'nombre_pieces',
		'surface',
		'dependance'
	];
}
