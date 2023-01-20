<?php

namespace App\Http\Controllers;

use App\Mail\RefusDevis;
use App\Mail\SouscriptionContrat;
use App\Models\Contrat;
use Illuminate\Support\Facades\Mail;

/**
 * assure la gestion d'un contrat
 */
class ContratController extends Controller
{
	/**
	 * affiche tous les éléments
	 */
	public function view()
	{
		// $contrats = Contrat::join('utilisateurs', 'contrat.id_utilisateur', '=', 'utilisateurs.id')->get(['utilisateurs.*']);
		$contrats = Contrat::all();
		return view('redacteurs.contrats', [
			'contrats' => $contrats,
		]);
	}

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
			'type' => request('type'),
			'niveau' => request('niveau'),
			'option_contrat' => request('option_contrat'),
		]);
		return back();
	}

	/**
	 * contracte un contrat
	 */
	public function souscrire()
	{
		Mail::to('kjuste02@outlook.fr')->send(new SouscriptionContrat());
		$id = request('id');
		$contrat = Contrat::firstWhere('id', $id);
		$contrat->update([
			'statut' => 'Validé',
		]);
		return view('redacteurs.contrats');
	}

	/**
	 * contracte un contrat
	 */
	public function refuser()
	{
		Mail::to('kjuste02@outlook.fr')->send(new RefusDevis());
		$id = request('id');
		$contrat = Contrat::firstWhere('id', $id);
		$contrat->update([
			'statut' => 'Refusé',
		]);
		return view('redacteurs.contrats');
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
