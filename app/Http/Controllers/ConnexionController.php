<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;

/**
 * L'ensemble des fonctions associées à l'authentification d'un utilisateur
 */
class ConnexionController extends Controller
{
	/**
	 * assure la connexion d'un utilisateur
	 */
	public function connexion()
	{
		request()->validate([
			'email' => ['required', 'email'],
			'password' => ['required'],
		]);
		$result = auth()->attempt([
			'email' => request('email'),
			'motdepasse' => request('password'),
		]);
		
		// dd($result);
		if ($result) {
			return redirect('/redacteur');
		}
		return back()->withInput()->withErrors([
			'email' => 'Votre email est incorrect.',
			'password' => 'Votre mot de passe est incorrect.',
		]);
	}

	/**
	 * assure la déconnexion d'un utilisateur
	 * @return login la page de connexion
	 */
	public function deconnexion()
	{
		auth()->logout();
		return redirect('/login');
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
			'motdepasse' => ['required', 'confirmed'],
			'confirmation' => ['required'],
		]);

		$email = request('email');
		$utilisateur = Utilisateur::firstWhere('email', $email);
		$utilisateur->update([
			'motdepasse' => bcrypt(request('motdepasse')),
		]);

		return redirect('/');
	}
}
