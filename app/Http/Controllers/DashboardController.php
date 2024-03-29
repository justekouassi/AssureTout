<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contentieux;
use App\Models\Contrat;
use App\Models\Courrier;
use App\Models\Sinistre;
use App\Models\Courtier;
use App\Models\Expert;
// use App\Models\Offre;
use App\Models\Redacteur;
use App\Models\Teleoperateur;
use App\Models\Utilisateur;

class DashboardController extends Controller
{
	public function admin()
	{
		$clients = Client::all();
		$contentieux = Contentieux::all();
		$courtiers = Courtier::all();
		$experts = Expert::all();
		$redacteurs = Redacteur::all();
		$teleoperateurs = Teleoperateur::all();

		return view('administrateurs.admin', [
			'clients' => $clients,
			'contentieux' => $contentieux,
			'courtiers' => $courtiers,
			'experts' => $experts,
			'redacteurs' => $redacteurs,
			'teleoperateurs' => $teleoperateurs,
		]);
	}

	public function contentieux()
	{
		$contentieux = Sinistre::where('contentieux', 1);
		return view('contentieux.contentieux', [
			'contentieux' => $contentieux,
		]);
	}

	public function courtier()
	{
		$clients = Client::all();
		$sinistres = Sinistre::all();
		$contentieux = Sinistre::all();

		return view('courtiers.courtier', [
			'clients' => $clients,
			'sinistres' => $sinistres,
			'contentieux' => $contentieux,
		]);
	}

	public function expert()
	{
		$sinistres = Sinistre::all(); // jointure
		return view('experts.expert', [
			'sinistres' => $sinistres,
		]);
	}

	public function redacteur()
	{
		$courriers = Courrier::all();
		$contrats = Contrat::all();
		$experts = Expert::all();
		$sinistres = Sinistre::all();

		return view('redacteurs.redacteur', [
			'courriers' => $courriers,
			'contrats' => $contrats,
			'experts' => $experts,
			'sinistres' => $sinistres,
		]);
	}

	public function teleoperateur()
	{
		// $offres = Offre::all();
		$clients = Utilisateur::where('role', 'Client')->get();
		$sinistres = Sinistre::all();

		return view('teleoperateurs.teleoperateur', [
			// 'offres' => $offres,
			'clients' => $clients,
			'sinistres' => $sinistres,
		]);
	}
}
