<?php

namespace App\Http\Controllers;

use App\Models\Contrat;

/**
 * assure la gestion d'un contrat
 */
class ContratController extends Controller
{
	/**
	 * crée un nouveau contrat
	 */
	public function ajouter()
	{
		Contrat::validate();
		Contrat::create([
			'date_creation' => request('date_creation'),
			'date_debut' => request('date_debut'),
			'date_fin' => request('date_fin'),
			'prix' => request('prix'),
			'statut' => request('statut'),
			'type' => request('type'),
			'niveau' => request('niveau'),
			'option_contrat' => request('option_contrat'),
		]);

		return back()->withInput()->withErrors([
			'email' => 'Ce contrat est déjà inscrit',
		]);
	}

	/**
	 * consulte les informations d'un contrat
	 */
	public function consulter()
	{
		$id = request('id');
		$contrat = Contrat::firstWhere('id', $id);
		return view('redacteurs.contrat-edit', [
			'contrat' => $contrat,
		]);
	}

	/**
	 * modifie les attributs d'un contrat
	 */
	public function modifier()
	{
		$id = request('id');
		$contrat = Contrat::firstWhere('id', $id);
		Contrat::validate();
		$contrat->update([
			'date_creation' => request('date_creation'),
			'date_debut' => request('date_debut'),
			'date_fin' => request('date_fin'),
			'prix' => request('prix'),
			'statut' => request('statut'),
			'type' => request('type'),
			'niveau' => request('niveau'),
			'option_contrat' => request('option_contrat'),
		]);
		return back();
	}

	/**
	 * supprime un contrat
	 */
	public function supprimer()
	{
		$id = request('id');
		Contrat::firstWhere('id', $id)->delete();
		return back();
	}
}
