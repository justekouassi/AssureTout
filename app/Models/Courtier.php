<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courtier extends Model
{
	protected $table = 'courtiers';

	protected $fillable = [
		'id_utilisateur',
	];
}
