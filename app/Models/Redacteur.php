<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Redacteur extends Model
{
	protected $table = 'redacteurs';

	protected $fillable = [
		'id_utilisateur',
	];

	public $timestamps = false;
}
