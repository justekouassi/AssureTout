<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceClient extends Model
{
	protected $table = 'service_clients';

	protected $fillable = [
		'id_utilisateur',
	];

	public $timestamps = false;
}
