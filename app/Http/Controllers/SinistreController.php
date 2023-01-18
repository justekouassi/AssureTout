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
		]);
		return view('experts.sinistres');
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
		$a = (int) request('id');
		// dd($sinistre);
		$sinistre->update([
			'date_declaration' => '2023-01-04',
			'montant' => 4,
			'statut' => 'Traitement',
			'scan' => NULL,
			'contentieux' => 0,
			'transcription' => 'Sinistre modifié',
			'id_redacteur' => 2,
			'id_expert' => 2,
		]);
		return back();
	}

	/**
	 * contracte un sinistre
	 */
	public function notifier()
	{
		Mail::to('kjuste02@outlook.fr')->send(new Remboursement());
		$id = request('id');
		$sinistre = Sinistre::firstWhere('id', $id);
		$sinistre->update([
			'statut' => request('Remboursé'),
		]);
		return view('redacteurs.sinistres');
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
