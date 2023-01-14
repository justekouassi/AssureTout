<?php

namespace App\Http\Controllers;

use App\Models\Sinistre;
use App\Mail\ReportedSinistre;
use Illuminate\Support\Facades\Mail;

/**
 * assure la gestion d'une sinistre
 */
class SinistreController extends Controller
{
	/**
	 * ajoute une sinistre dans la base de données
	 */
	public function ajouter()
	{
		Sinistre::validate();
		Sinistre::create([
			"date_declaration" => request("date_declaration"),
			"montant" => request("montant"),
			"statut" => request("statut"),
			"scan" => request("scan"),
			"transcription" => request("transcription"),
		]);
		return back();
	}

	/**
	 * affiche toutes les informations concernant une sinistre
	 */
	public function afficher()
	{
		$id = request("id");
		$sinistre = Sinistre::firstWhere('id', $id);
		return view("view_sinistre", [
			'sinistre' => $sinistre,
		]);
	}

	/**
	 * consulte les informations d'une sinistre en vue d'une éventuelle
	 * modification
	 */
	public function consulter()
	{
		$id = request("id");
		$sinistre = Sinistre::firstWhere('id', $id);
		return view("edit_sinistre", [
			'sinistre' => $sinistre,
		]);
	}

	/**
	 * modifie les attributs d'une sinistre
	 */
	public function modifier()
	{
		Sinistre::validate();

		$id = request("id");
		$sinistre = Sinistre::firstWhere('id', $id);
		$sinistre->update([
			"sinistre" => request("sinistre"),
			"reponse" => request("reponse"),
			"categorie" => request("categorie"),
			"explication" => request("explication"),
			"wiki" => request("wiki"),
			"media" => request("media"),
		]);
		return redirect('/browse');
	}

	/**
	 * signale une sinistre
	 */
	public function signaler()
	{
		$id = request("id");
		$sinistre = Sinistre::firstWhere('id', $id);
		Mail::to("kjuste02@gmail.com")->send(new ReportedSinistre($sinistre));
	}

	/**
	 * supprime une sinistre
	 */
	public function supprimer()
	{
		$id = request("id");
		Sinistre::firstWhere('id', $id)->delete();
		return redirect('/browse');
	}
}
