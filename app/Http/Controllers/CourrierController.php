<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use Illuminate\Support\Facades\DB;

/**
 * assure la gestion d'un contrat
 */
class CourrierController extends Controller
{
	/**
	 * assure l'inscription d'un courrier
	 */
	public function ajouter()
	{
		Courrier::create([
			'date' => request('date'),
			'description' => request('description'),
		]);

		return back()->withInput()->withErrors([
			'email' => 'Cet courrier est déjà inscrit',
		]);
	}
	
	/**
	 * consulte les informations d'un courrier
	 */
	public function consulter()
	{
		$id = request('id');
		$courrier = Courrier::firstWhere('id', $id);
		return view('redacteurs.courrier-edit', [
			'courrier' => $courrier,
		]);
	}

	/**
	 * modifie les attributs d'un courrier
	 */
	public function modifier()
	{
		$id = request('id');
		$courrier = Courrier::firstWhere('id', $id);
		$courrier->update([
			'date' => request('date'),
			'description' => request('description'),
		]);
		return back();
	}

	/**
	 * supprime un courrier
	 */
	public function supprimer()
	{
		$id = request('id');
		Courrier::firstWhere('id', $id)->delete();
		return back();
	}
}
