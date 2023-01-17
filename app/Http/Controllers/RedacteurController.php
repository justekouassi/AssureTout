<?php

namespace App\Http\Controllers;

use App\Models\Redacteur;
use App\Models\Utilisateur;

/**
 * assure la gestion d'un contrat
 */
class RedacteurController extends Controller
{
	/**
	 * assure l'inscription d'un utilisateur
	 */
	public function ajouter()
	{
		Utilisateur::validate();
		$utilisateur = Utilisateur::create([
			'nom' => request('nom'),
			'prenoms' => request('prenoms'),
			'email' => request('email'),
			'motdepasse' => bcrypt(request('password')),
			'telephone' => request('telephone'),
			'role' => 'Rédacteur',
		]);

		Redacteur::create([
			'id_utilisateur' => $utilisateur->id,
		]);

		return back()->withInput()->withErrors([
			'email' => 'Cet rédacteur est déjà inscrit',
		]);
	}

	/**
	 * consulte les informations d'un contrat en vue d'une éventuelle 
	 * modification
	 */
	public function consulter()
	{
		$id = request('id');
		$redacteur = Redacteur::firstWhere('id', $id);
		return view('administrateurs.redacteurs.redacteur-edit', [
			'redacteur' => $redacteur,
		]);
	}

	/**
	 * modifie les attributs d'un redacteur
	 */
	public function modifier()
	{
		Redacteur::validate();
		$id = request('id');
		$redacteur = Redacteur::firstWhere('id', $id);
		$redacteur->update([
			'nom' => request('nom'),
			'prenoms' => request('prenoms'),
			'email' => request('email'),
			'motdepasse' => bcrypt(request('motdepasse')),
			'telephone' => request('telephone'),
		]);
		return back();
	}

	/**
	 * supprime un rédacteur
	 */
	public function supprimer()
	{
		$id = request('id');
		Redacteur::firstWhere('id', $id)->delete();
		return back();
	}
}
