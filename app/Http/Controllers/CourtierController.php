<?php

namespace App\Http\Controllers;

use App\Models\Courtier;
use App\Models\Utilisateur;

/**
 * assure la gestion d'un contrat
 */
class CourtierController extends Controller
{
	/**
	 * assure l'inscription d'un utilisateur
	 */
	public function ajouter()
	{
		request()->validate([
			'nom' => ['required', 'min:3'],
			'prenoms' => ['required', 'min:3'],
			'email' => ['required', 'email'],
			'motdepasse' => ['required'],
			'telephone' => [],
		]);

		Utilisateur::create([
			'nom' => request('nom'),
			'prenoms' => request('prenoms'),
			'email' => request('email'),
			'motdepasse' => bcrypt(request('motdepasse')),
			'telephone' => request('telephone'),
			'role' => 'Courtier',
		]);

		return back()->withInput()->withErrors([
			'email' => 'Cet courtier est déjà inscrit',
		]);
	}
	/**
	 * consulte les informations d'un courtier
	 */
	public function consulter()
	{
		$id = request('id');
		$courtier = Courtier::firstWhere('id', $id);
		return view('administrateurs.courtiers.courtier-edit', [
			'courtier' => $courtier,
		]);
	}

	/**
	 * modifie les attributs d'un courtier
	 */
	public function modifier()
	{
		Courtier::validate();
		$id = request('id');
		$courtier = Courtier::firstWhere('id', $id);
		$courtier->update([
			'nom' => request('nom'),
			'prenoms' => request('prenoms'),
			'email' => request('email'),
			'motdepasse' => bcrypt(request('motdepasse')),
			'telephone' => request('telephone'),
		]);
		return back();
	}

	/**
	 * supprime un courtier
	 */
	public function supprimer()
	{
		$id = request('id');
		Courtier::firstWhere('id', $id)->delete();
		return back();
	}
}
