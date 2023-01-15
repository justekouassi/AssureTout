<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContratSante extends Model
{
	protected $table = 'contrats_sante';

	protected $fillable = [
		'id_contrat',
		'complementaire',
		'nombre',
		'regime'
	];
}
