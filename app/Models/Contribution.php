<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
	protected $table = "contributions";

	protected $fillable = [
		'id_question',
		'id_utilisateur',
	];
}
