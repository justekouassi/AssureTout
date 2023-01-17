<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class Utilisateur extends Model implements Authenticatable
{
	use BasicAuthenticatable;

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

	public static function validate()
	{
		request()->validate([
			'nom' => ['required', 'min:3'],
			'prenoms' => ['required', 'min:3'],
			'email' => ['required', 'email'],
			'motdepasse' => ['required'],
			'telephone' => [],
		]);
	}
}
