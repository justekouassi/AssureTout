<?php

namespace App\Http\Controllers;

use App\Models\Contentieux;
use App\Models\Utilisateur;

/**
 * assure la gestion d'un contrat
 */
class ContentieuxController extends Controller
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
			'role' => 'Contentieux',
		]);

		return back()->withInput()->withErrors([
			'email' => 'Cet contentieux est déjà inscrit',
		]);
	}
	/**
	 * consulte les informations d'un contentieux
	 */
	public function consulter()
	{
		$id = request('id');
		$contentieux = Contentieux::firstWhere('id', $id);
		return view('administrateurs.contentieux.contentieux-edit', [
			'contentieux' => $contentieux,
		]);
	}

	/**
	 * modifie les attributs d'un contentieux
	 */
	public function modifier()
	{
		Contentieux::validate();
		$id = request('id');
		$contentieux = Contentieux::firstWhere('id', $id);
		$contentieux->update([
			'nom' => request('nom'),
			'prenoms' => request('prenoms'),
			'email' => request('email'),
			'motdepasse' => bcrypt(request('motdepasse')),
			'telephone' => request('telephone'),
		]);
		return back();
	}

	/**
	 * supprime un contentieux
	 */
	public function supprimer()
	{
		$id = request('id');
		Contentieux::firstWhere('id', $id)->delete();
		return back();
	}
}
