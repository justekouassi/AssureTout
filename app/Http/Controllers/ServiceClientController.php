<?php

namespace App\Http\Controllers;

use App\Models\ServiceClient;
use App\Models\Utilisateur;

/**
 * assure la gestion d'un contrat
 */
class ServiceClientController extends Controller
{
	/**
	 * assure l'inscription d'un utilisateur
	 */
	public function ajouter()
	{
		request()->validate([
			'nom' => ['required', 'min:3'],
			'prenoms' => ['required', 'min:3'],
			'email' => ['required', 'email'],
			'motdepasse' => ['required'],
			'telephone' => [],
		]);

		Utilisateur::create([
			'nom' => request('nom'),
			'prenoms' => request('prenoms'),
			'email' => request('email'),
			'motdepasse' => bcrypt(request('motdepasse')),
			'telephone' => request('telephone'),
			'role' => 'Service clientèle',
		]);

		return back()->withInput()->withErrors([
			'email' => 'Cet rédacteur est déjà inscrit',
		]);
	}
	/**
	 * consulte les informations d'un contrat en vue d'une éventuelle 
	 * modification
	 */
	public function consulter()
	{
		$id = request('id');
		$service_client = ServiceClient::firstWhere('id', $id);
		return view('administrateurs.service_clients.service-client-edit', [
			'service-client' => $service_client,
		]);
	}

	/**
	 * modifie les attributs d'un service-client
	 */
	public function modifier()
	{
		ServiceClient::validate();
		$id = request('id');
		$service_client = ServiceClient::firstWhere('id', $id);
		$service_client->update([
			'nom' => request('nom'),
			'prenoms' => request('prenoms'),
			'email' => request('email'),
			'motdepasse' => bcrypt(request('motdepasse')),
			'telephone' => request('telephone'),
		]);
		return back();
	}

	/**
	 * supprime un rédacteur
	 */
	public function supprimer()
	{
		$id = request('id');
		ServiceClient::firstWhere('id', $id)->delete();
		return back();
	}
}
