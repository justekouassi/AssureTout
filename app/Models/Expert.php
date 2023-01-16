<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
	protected $table = 'experts';

	protected $fillable = [
		'id_utilisateur',
		'domaine'
	];

	public $timestamps = false;
}
