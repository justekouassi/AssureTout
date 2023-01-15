<?php

namespace App\Http\Controllers;

use App\Models\ContratHabitation;

/**
 * assure la gestion d'un contrat
 */
class ContratHabitationController extends Controller
{
	/**
	 * consulte les informations d'un contrat en vue d'une éventuelle 
	 * modification
	 */
	public function consulter()
	{
		$id = request('id');
		$contrat = ContratHabitation::firstWhere('id', $id);
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
		$contrat = ContratHabitation::firstWhere('id', $id);
		return view('service_contrat.contrat');
	}
}
