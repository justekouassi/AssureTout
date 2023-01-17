<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use App\Models\Utilisateur;

/**
 * assure la gestion d'un contrat
 */
class ExpertController extends Controller
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
		$expert = Expert::firstWhere('id', $id);
		return view('administrateurs.experts.expert-edit', [
			'expert' => $expert,
		]);
	}

	/**
	 * modifie les attributs d'un expert
	 */
	public function modifier()
	{
		Expert::validate();
		$id = request('id');
		$expert = Expert::firstWhere('id', $id);
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
