<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
	protected $table = "niveaux";

	protected $fillable = [
		'lib_niveau',
	];
}
