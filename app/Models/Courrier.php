<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
	protected $table = 'courriers';

	protected $fillable = [
		'id_utilisateur',
		'date',
		'description',
	];

	public $timestamps = false;
}
