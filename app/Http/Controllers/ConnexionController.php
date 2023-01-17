<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;

/**
 * L'ensemble des fonctions associées à l'authentification d'un utilisateur
 */
class ConnexionController extends Controller
{
	// public function __construct()
	// {
	// 	$this->middleware('auth')->except('fonction');
	// }


	/**
	 * assure la connexion d'un utilisateur
	 */
	public function connexion()
	{
		request()->validate([
			'email' => ['required', 'email'],
			'motdepasse' => ['required', 'min:4'],
		]);
		$result = auth()->attempt([
			'email' => request('email'),
			'password' => request('motdepasse'),
		]);

		// dd(auth()->user());
		$role = auth()->user()->role;
		if ($result) {
			switch ($role) {
				case 'Admin':
					return redirect('/admin');
				case 'Contentieux':
					return redirect('/contentieux');
				case 'Courtier':
					return redirect('/courtier');
				case 'Expert':
					return redirect('/expert');
				case 'Rédacteur':
					return redirect('/redacteur');
				case 'Téléopérateur':
					return redirect('/teleoperateur');
				default:
					return redirect('/admin');
			}
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

		return redirect('/login');
	}
}
