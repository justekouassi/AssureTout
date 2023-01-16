<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Mail\ConfirmAccount;
use Illuminate\Support\Facades\Mail;

/**
 * L'ensemble des fonctions associées à l'authentification d'un utilisateur
 */
class ConnexionController extends Controller
{
	/**
	 * assure la connexion d'un utilisateur
	 * @return accueil la page d'accueil
	 */
	public function connexion()
	{
		request()->validate([
			'email' => ['required', 'email'],
			'password' => ['required'],
		]);
		$result = auth()->attempt([
			'email' => request('email'),
			'password' => request('password'),
		]);
		if ($result) {
			return redirect('/');
		}
		return back()->withInput()->withErrors([
			'email' => 'Vos identifiants sont incorrects.',
		]);
	}

	/**
	 * assure la déconnexion d'un utilisateur
	 * @return login la page de connexion
	 */
	public function deconnexion()
	{
		auth()->logout();
		return redirect('/');
	}

	/**
	 * 
	 */
	public function attenteNouveauMdp()
	{
		
	}


	/**
	 * permet de modifier le mot de passe d'un utilisateur
	 * @return login la page de connexion
	 */
	public function nouveauMdp()
	{
		request()->validate([
			'email' => ['required', 'email'],
			'password' => ['required', 'confirmed'],
			'password_confirmation' => ['required'],
		]);

		$email = request('email');
		$utilisateur = Utilisateur::where('email', $email)->first();
		$utilisateur->update([
			'motdepasse' => bcrypt(request('password')),
		]);

		return redirect('/');
	}
}
