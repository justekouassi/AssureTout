<?php

namespace App\Http\Controllers;

use App\Models\Teleoperateur;
use App\Models\Utilisateur;

/**
 * assure la gestion d'un contrat
 */
class TeleoperateurController extends Controller
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
			'motdepasse' => bcrypt(request('motdepasse')),
			'telephone' => request('telephone'),
			'role' => 'Téléopérateur',
		]);

		Teleoperateur::create([
			'id_utilisateur' => $utilisateur->id,
		]);

		return back()->withInput()->withErrors([
			'email' => 'Cet téléopérateur est déjà inscrit',
		]);
	}

	/**
	 * consulte les informations d'un contrat en vue d'une éventuelle 
	 * modification
	 */
	public function consulter()
	{
		$id = request('id');
		$teleoperateur = Teleoperateur::firstWhere('id', $id);
		return view('administrateurs.teleoperateurs.teleoperateur-edit', [
			'teleoperateur' => $teleoperateur,
		]);
	}

	/**
	 * modifie les attributs d'un teleoperateur
	 */
	public function modifier()
	{
		Teleoperateur::validate();
		$id = request('id');
		$teleoperateur = Teleoperateur::firstWhere('id', $id);
		$teleoperateur->update([
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
		Teleoperateur::firstWhere('id', $id)->delete();
		return back();
	}
}
