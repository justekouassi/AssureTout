<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContratPrevoyance extends Model
{
	protected $table = 'contrats_prevoyance';

	protected $fillable = [
		'id_contrat',
		'complementaire',
		'nombre',
		'regime'
	];
}
