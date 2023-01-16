<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;
use Laravel\Sanctum\HasApiTokens;

class Utilisateur extends Model implements Authenticatable
{
	use BasicAuthenticatable, HasApiTokens;

	protected $table = 'utilisateurs';

	protected $fillable = [
		'nom',
		'prenoms',
		'email',
		'motdepasse',
		'telephone',
		'role',
	];

	public $timestamps = false;

	public function getAuthPassword()
	{
		return $this->motdepasse;
	}

	public function getRememberTokenName()
	{
		return null;
	}
}