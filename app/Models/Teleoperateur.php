<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teleoperateur extends Model
{
	protected $table = 'teleoperateurs';

	protected $fillable = [
		'id_utilisateur',
	];

	public $timestamps = false;
}
