<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Anglais extends Model
{
	use HasApiTokens;
	
	protected $table = "anglais";

	protected $fillable = [
		'question',
		'reponse',
		'categorie',
		'niveau',
		'essai',
		'bingo',
		'explication',
		'wiki',
		'media',
	];
}
