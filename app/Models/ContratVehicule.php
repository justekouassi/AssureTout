<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContratVehicule extends Model
{
	protected $table = 'contrats_vehicule';

	protected $fillable = [
		'id_contrat',
		'type',
		'date_circulation',
		'marque',
		'modele',
		'cylindree'
	];
}
