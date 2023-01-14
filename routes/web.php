<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConnexionController;

/* Accueil */

Route::get('/', function () {
	return view('welcome');
})->name('index');

/* Connexion */

Route::get('/login', function () {
	return view('login');
})->name('login');
Route::post('/login', [ConnexionController::class, 'connexion']);

/* Inscription */

Route::get('/signup', function () {
	return view('signup');
});
Route::post('/signup', [ConnexionController::class, 'inscription'])->name('signup');

/* Mot de passe */

Route::get('/change_password', function () {
	return view('change_password');
});
Route::post('/change_password', [ConnexionController::class, 'nouveauMdp']);
