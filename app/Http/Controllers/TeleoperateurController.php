<?php

namespace App\Http\Controllers;

use App\Models\Teleoperateur;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\DB;

/**
 * assure la gestion d'un contrat
 */
class TeleoperateurController extends Controller
{
	/**
	 * affiche tous les éléments
	 */
	public function view()
	{
		$teleoperateurs = Teleoperateur::join('utilisateurs', 'teleoperateurs.id_utilisateur', '=', 'utilisateurs.id')->get(['utilisateurs.*']);
		return view('administrateurs.teleoperateurs.teleoperateurs', [
			'teleoperateurs' => $teleoperateurs,
		]);
	}

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
	 * consulte les informations d'un teleoperateur
	 */
	public function consulter()
	{
		$id = request('id');
		$requete_teleoperateur = "SELECT utilisateurs.*
			FROM teleoperateurs 
			LEFT JOIN utilisateurs 
			ON teleoperateurs.id_utilisateur = utilisateurs.id
			WHERE utilisateurs.id = $id";

		$teleoperateur = DB::select($requete_teleoperateur);
		return view('administrateurs.teleoperateurs.teleoperateur-edit', [
			'teleoperateur' => $teleoperateur[0],
		]);
	}

	/**
	 * modifie les attributs d'un teleoperateur
	 */
	public function modifier()
	{
		Utilisateur::validate();
		$id = request('id');
		$teleoperateur = Utilisateur::firstWhere('id', $id);
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
	 * supprime un téléopérateur
	 */
	public function supprimer()
	{
		$id = request('id');
		Teleoperateur::firstWhere('id', $id)->delete();
		return back();
	}
}
