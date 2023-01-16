<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contentieux extends Model
{
	protected $table = 'contentieux';

	protected $fillable = [
		'id_utilisateur',
	];

	public $timestamps = false;
}
