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
	 * assure l'inscription d'un utilisateur
	 * @return index la page de connexion
	 */
	public function inscription()
	{
		request()->validate([
			'nom' => ['required', 'min:3'],
			'prenoms' => ['required', 'min:3'],
			'email' => ['required', 'email'],
			'datenaiss' => [],
			'sexe' => [],
			'statut' => [],
			'telephone' => [],
			'password' => ['required'],
		]);

		// $user = Utilisateur::where('email', request('email'))->first();
		// if ($user === null) {

		// }
		Utilisateur::create([
			"nom" => request("nom"),
			"email" => request("email"),
			"motdepasse" => bcrypt(request("password")),
		]);

		// return back()->withInput()->withErrors([
		// 	'email' => "Cet utilisateur est déjà inscrit",
		// ]);

		$user = [
			"nom" => request("nom"),
			"email" => request("email"),
		];

		return view('test.bar', [
			'user' => $user,
		]);
	}

	/**
	 * affiche la vue permettant au nouvel inscrit de confirmer son email et l'autorise à se connecter avec cet email
	 */
	public function attenteConfirmation()
	{
		$confirm_key = request("confirm_key");
		$nom = request("nom");
		$user = Utilisateur::where('nom', $nom)->where('confirm_key', $confirm_key)->first();
		return view('test.confirmed', [
			'user' => $user,
		]);
	}

	/**
	 * confirme l'email d'un utilisateur et l'autorise à se connecter avec cet email
	 * @return accueil la page d'accueil
	 */
	public function confirmation()
	{
		$nom = request("nom");
		$user = Utilisateur::where('nom', $nom)->first();
		$user->update([
			"confirmed" => 1,
		]);

		return redirect('/');
	}

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
			'confirmed' => 1,
		]);
		if (request('confirmed') == 0) {
			return back()->withInput()->withErrors([
				'email' => "Vous n'avez pas encore confirmé votre compte",
			]);
		}
		if ($result) {
			return redirect('/');
		}
		return back()->withInput()->withErrors([
			'email' => "Vos identifiants sont incorrects.",
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

		$email = request("email");
		$utilisateur = Utilisateur::where('email', $email)->first();
		$utilisateur->update([
			"motdepasse" => bcrypt(request("password")),
		]);

		return redirect('/');
	}
}
