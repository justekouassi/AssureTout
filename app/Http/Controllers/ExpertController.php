<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\DB;

/**
 * assure la gestion d'un contrat
 */
class ExpertController extends Controller
{
	/**
	 * affiche tous les éléments
	 */
	public function view()
	{
		// $experts = Expert::join('utilisateurs', 'experts.id_utilisateur', '=', 'utilisateurs.id')->get([
		// 	'utilisateurs.nom', 
		// 	'utilisateurs.prenoms', 
		// 	'utilisateurs.email', 
		// 	'utilisateurs.telephone', 
		// 	'experts.id', 
		// 	'experts.domaine'
		// ]);
		$experts = Expert::join('utilisateurs', 'experts.id_utilisateur', '=', 'utilisateurs.id')->get(['utilisateurs.*', 'experts.domaine']);
		return view('administrateurs.experts.experts', [
			'experts' => $experts,
		]);
	}

	/**
	 * crée un nouvel expert
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
			'role' => 'Expert',
		]);

		Expert::create([
			'id_utilisateur' => $utilisateur->id,
		]);

		return back()->withInput()->withErrors([
			'email' => 'Cet expert est déjà inscrit',
		]);
	}
	
	/**
	 * consulte les informations d'un expert
	 */
	public function consulter()
	{
		$id = request('id');
		$requete_expert = "SELECT utilisateurs.*
			FROM experts 
			LEFT JOIN utilisateurs 
			ON experts.id_utilisateur = utilisateurs.id
			WHERE utilisateurs.id = $id";

		$expert = DB::select($requete_expert);
		return view('administrateurs.experts.expert-edit', [
			'expert' => $expert[0],
		]);
	}

	/**
	 * modifie les attributs d'un expert
	 */
	public function modifier()
	{
		Utilisateur::validate();
		$id = request('id');
		$expert = Utilisateur::firstWhere('id', $id);
		$expert->update([
			'nom' => request('nom'),
			'prenoms' => request('prenoms'),
			'email' => request('email'),
			'motdepasse' => bcrypt(request('motdepasse')),
			'telephone' => request('telephone'),
		]);
		return back();
	}

	/**
	 * supprime un expert
	 */
	public function supprimer()
	{
		$id = request('id');
		Expert::firstWhere('id', $id)->delete();
		return back();
	}
}
