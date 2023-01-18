<?php

namespace App\Http\Controllers;

use App\Models\Contentieux;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\DB;

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
		Utilisateur::validate();
		$utilisateur = Utilisateur::create([
			'nom' => request('nom'),
			'prenoms' => request('prenoms'),
			'email' => request('email'),
			'motdepasse' => bcrypt(request('motdepasse')),
			'telephone' => request('telephone'),
			'role' => 'Contentieux',
		]);

		Contentieux::create([
			'id_utilisateur' => $utilisateur->id,
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
		$requete_contentieux = "SELECT utilisateurs.*
			FROM contentieux 
			LEFT JOIN utilisateurs 
			ON contentieux.id_utilisateur = utilisateurs.id
			WHERE utilisateurs.id = $id";

		$contentieux = DB::select($requete_contentieux);
		return view('administrateurs.contentieux.contentieux-edit', [
			'contentieux' => $contentieux[0],
		]);
	}

	/**
	 * modifie les attributs d'un contentieux
	 */
	public function modifier()
	{
		Utilisateur::validate();
		$id = request('id');
		$contentieux = Utilisateur::firstWhere('id', $id);
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
