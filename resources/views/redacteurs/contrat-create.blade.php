@extends('redacteurs.base-redacteur')

@section('title', 'Création d\'un nouveau contrat')

@section('css')
	<link href="/css/base.css" rel="stylesheet">
@endsection

@section('content')

	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-center mb-4">
			<h1 class="h3 mb-0 text-gray-800">Nouveau contrat</h1>
		</div>
		<form class="form" method="POST" action="/redacteur/contrats/create">
			@csrf
			<div class="input-container half ic2">
				<input class="input" id="date_creation" name="date_creation" type="date" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="date_creation">Date de création</label>
			</div>
			<div class="input-container half ic2">
				<select required name="type" class="input" id="type">
					<option selected disabled value="">* Choisir le type de contrat *</option>
					<option value="Habitation">Habitation</option>
					<option value="Prévoyance">Prévoyance</option>
					<option value="Santé">Santé</option>
					<option value="Véhicule">Véhicule</option>
				</select>
				<div class="cut"></div>
				<label class="placeholder" for="type">Type</label>
			</div>
			<div class="input-container half ic2">
				<input class="input" id="date_debut" name="date_debut" type="date" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="date_debut">Date de début</label>
			</div>
			<div class="input-container half ic2">
				<input class="input" id="date_fin" name="date_fin" type="date" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="date_fin">Date de fin</label>
			</div>
			<div class="input-container half ic2">
				<input class="input" id="prix" name="prix" type="number" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="prix">Prix</label>
			</div>
			<div class="input-container half ic2">
				<input class="input" id="niveau" name="niveau" type="number" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="niveau">Niveau</label>
			</div>
			<div class="input-container ic2">
				<input class="input" id="option_contrat" name="option_contrat" type="text" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="option_contrat">Option</label>
			</div>
			<button class="submit" type="submit">Enregistrer</button>
		</form>
	</div>

@endsection
