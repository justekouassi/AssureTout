<?php

namespace App\Http\Controllers;

use App\Models\Contentieux;

/**
 * assure la gestion d'un contentieux
 */
class ContentieuxController extends Controller
{
	/**
	 * consulte les informations d'un contentieux en vue d'une éventuelle 
	 * modification
	 */
	public function consulter()
	{
		$id = request('id');
		$contentieux = Contentieux::firstWhere('id', $id);
		return view('service_contentieux.contentieux-view', [
			'contentieux' => $contentieux,
		]);
	}

	/**
	 * notifier à un contentieux ses informations
	 */
	public function notifier()
	{
		$id = request('id');
		$contentieux = Contentieux::firstWhere('id', $id);
		return view('service_contentieux.contentieux');
	}
}
