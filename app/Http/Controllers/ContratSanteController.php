<?php

namespace App\Http\Controllers;

use App\Models\ContratSante;

/**
 * assure la gestion d'un contrat
 */
class ContratSanteController extends Controller
{
	/**
	 * consulte les informations d'un contrat en vue d'une éventuelle 
	 * modification
	 */
	public function consulter()
	{
		$id = request('id');
		$contrat = ContratSante::firstWhere('id', $id);
		return view('service_contrat.contrat-view', [
			'contrat' => $contrat,
		]);
	}

	/**
	 * notifier à un contrat ses informations
	 */
	public function notifier()
	{
		$id = request('id');
		$contrat = ContratSante::firstWhere('id', $id);
		return view('service_contrat.contrat');
	}
}
