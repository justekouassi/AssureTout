<?php

namespace App\Http\Controllers;

use App\Models\Sinistre;
use App\Mail\SouscriptionContrat;
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
		return view('sinistres.sinistre-edit', [
			'sinistre' => $sinistre,
		]);
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
	 * contracte un sinistre
	 */
	public function contracter()
	{
		$id = request('id');
		$sinistre = Sinistre::firstWhere('id', $id);
		Mail::to('kjuste02@outlook.fr')->send(new SouscriptionContrat($sinistre));
		return view('sinistres.sinistres');
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
