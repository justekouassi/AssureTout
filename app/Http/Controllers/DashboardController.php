<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contentieux;
use App\Models\Courtier;
use App\Models\Expert;
use App\Models\Redacteur;
use App\Models\ServiceClient;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
	public function index()
	{
		$clients = Client::all();
		$contentieux = Contentieux::all();
		$courtiers = Courtier::all();
		$experts = Expert::all();
		$redacteurs = Redacteur::all();
		$service_clients = ServiceClient::all();

		return view('administrateurs.admin', [
			'clients' => $clients,
			'contentieux' => $contentieux,
			'courtiers' => $courtiers,
			'experts' => $experts,
			'redacteurs' => $redacteurs,
			'service_clients' => $service_clients,
		]);
	}
}
