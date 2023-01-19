<?php

namespace App\Http\Controllers;

use App\Models\Sinistre;
use App\Mail\Remboursement;
use App\Models\Expert;
use Illuminate\Support\Facades\Mail;

/**
 * assure la gestion d'un sinistre
 */
class SinistreController extends Controller
{
	/**
	 * affiche tous les éléments
	 */
	public function viewRedacteur()
	{
		$sinistres = Sinistre::join('utilisateurs', 'sinistres.id_utilisateur', '=', 'utilisateurs.id')
			->where('utilisateurs.role', 'Rédacteur')
			->get(['sinistres.*']);
		return view('redacteurs.sinistres', [
			'sinistres' => $sinistres,
		]);
	}

	/**
	 * affiche tous les éléments
	 */
	public function viewExpert()
	{
		$sinistres = Sinistre::join('utilisateurs', 'sinistres.id_utilisateur', '=', 'utilisateurs.id')
			->where('utilisateurs.role', 'Expert')
			->where('sinistres.statut', 'Traitement')
			->get(['sinistres.*']);
		return view('experts.sinistres', [
			'sinistres' => $sinistres,
		]);
	}

	/**
	 * ajoute un sinistre dans la base de données
	 */
	public function ajouter()
	{
		Sinistre::validate();
		Sinistre::create([
			'date_declaration' => request('date_declaration'),
			'montant' => request('montant'),
			'statut' => request('statut'),
			'scan' => request('scan'),
			'contestation' => request('contestation'),
			'transcription' => request('transcription'),
		]);
		return back();
	}

	/**
	 * consulte les informations d'un sinistre en vue d'une éventuelle
	 * modification
	 */
	public function consulter()
	{
		$id = request('id');
		$sinistre = Sinistre::firstWhere('id', $id);
		return view('courtiers.sinistre-edit', [
			'sinistre' => $sinistre,
		]);
	}

	/**
	 * permet à un expert de consulter les informations d'un sinistre 
	 * avant d'évaluer le montant de remboursement
	 */
	public function consulterExpert()
	{
		$id = request('id');
		$sinistre = Sinistre::firstWhere('id', $id);
		return view('experts.sinistre-edit', [
			'sinistre' => $sinistre,
		]);
	}

	/**
	 * modifie le montant de remboursement d'un sinistre et change son statut
	 */
	public function modifierMontant()
	{
		$id = request('id');
		$sinistre = Sinistre::firstWhere('id', $id);
		$sinistre->update([
			'montant' => request('montant'),
			'statut' => 'Estimé',
			'id_utilisateur' => 59,
		]);
		return redirect('/expert/sinistres');
	}

	/**
	 * modifie les attributs d'un sinistre
	 */
	public function modifier()
	{
		Sinistre::validate();
		$id = request('id');
		$sinistre = Sinistre::firstWhere('id', $id);
		$sinistre->update([
			'date_declaration' => request('date_declaration'),
			'montant' => request('montant'),
			'statut' => request('statut'),
			'scan' => request('scan'),
			'contestation' => request('contestation'),
			'transcription' => request('transcription'),
		]);
		return back();
	}

	/**
	 * sélectionne un sinistre et recherche un expert 
	 */
	public function affecter()
	{
		$experts = Expert::join('utilisateurs', 'experts.id_utilisateur', '=', 'utilisateurs.id')->get([
			'utilisateurs.nom',
			'utilisateurs.prenoms',
			'utilisateurs.email',
			'utilisateurs.telephone',
			'experts.id',
			'experts.domaine',
		]);

		$id_sinistre = request('id_sinistre');
		return view('redacteurs.experts', [
			'id_sinistre' => $id_sinistre,
			'experts' => $experts,
		]);
	}

	/**
	 * affecte le sinistre choisi à un expert 
	 */
	public function choisir()
	{
		$sinistre = Sinistre::firstWhere('id', request('id_sinistre'));
		$sinistre->update([
			'id_utilisateur' => request('id'),
		]);
		return redirect('/redacteur/sinistres');
	}

	/**
	 * contracte un sinistre
	 */
	public function rembourser()
	{
		$id = request('id');
		$sinistre = Sinistre::firstWhere('id', $id);
		if ($sinistre->montant > 1500) {
			// chèque signé
		} else {
			// chèque non signé
		}
		$user = [$sinistre];
		Mail::to('kjuste02@outlook.fr')->send(new Remboursement($user));
		$sinistre->update([
			'statut' => request('Remboursé'),
		]);
		return redirect('/redacteur/sinistres');
	}

	/**
	 * supprime un sinistre
	 */
	public function supprimer()
	{
		$id = request('id');
		Sinistre::firstWhere('id', $id)->delete();
		return back();
	}
}
