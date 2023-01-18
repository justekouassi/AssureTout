<?php

namespace App\Http\Controllers;

use App\Models\Courtier;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\DB;

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
		Utilisateur::validate();
		$utilisateur = Utilisateur::create([
			'nom' => request('nom'),
			'prenoms' => request('prenoms'),
			'email' => request('email'),
			'motdepasse' => bcrypt(request('motdepasse')),
			'telephone' => request('telephone'),
			'role' => 'Courtier',
		]);

		Courtier::create([
			'id_utilisateur' => $utilisateur->id,
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
		$requete_courtier = "SELECT utilisateurs.*
			FROM courtiers 
			LEFT JOIN utilisateurs 
			ON courtiers.id_utilisateur = utilisateurs.id
			WHERE utilisateurs.id = $id";

		$courtier = DB::select($requete_courtier);
		return view('administrateurs.courtiers.courtier-edit', [
			'courtier' => $courtier[0],
		]);
	}

	/**
	 * modifie les attributs d'un courtier
	 */
	public function modifier()
	{
		Utilisateur::validate();
		$id = request('id');
		$courtier = Utilisateur::firstWhere('id', $id);
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
