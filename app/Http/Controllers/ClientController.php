<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Mail\InfosClient;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Mail;

/**
 * assure la gestion d'un client
 */
class ClientController extends Controller
{
	/**
	 * consulte les informations d'un client en vue d'une éventuelle 
	 * modification
	 */
	public function informer()
	{
		$id = request('id');
		$client = Client::firstWhere('id', $id);
		return back();
	}

	/**
	 * consulte les informations d'un client en vue d'une éventuelle 
	 * modification
	 */
	public function consulter()
	{
		$id = request('id');
		$client = Utilisateur::where('role', 'Client')->where('id', $id)->first();
		return view('teleoperateurs.client-view', [
			'client' => $client,
		]);
	}

	/**
	 * notifier à un client ses informations
	 */
	public function notifier()
	{
		$id = request('id');
		$client = Client::firstWhere('id', $id);
		Mail::to('kjuste02@outlook.fr')->send(new InfosClient($client));
		return view('teleoperateurs.clients');
	}
}
