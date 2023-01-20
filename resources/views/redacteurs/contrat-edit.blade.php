@extends('redacteurs.base-redacteur')

@section('title', 'Modification d\'un contrat')

@section('css')
	<link href="/css/base.css" rel="stylesheet">
@endsection

@section('content')

	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-center mb-4">
			<h1 class="h3 mb-0 text-gray-800">Modifier contrat N°{{ $contrat->id }}</h1>
		</div>
		<form class="form" method="POST" action="/redacteur/contrats/{{ $contrat->id }}/edit">
			@csrf
			<div class="input-container half ic2">
				<input class="input" id="date_creation" name="date_creation" type="date" value="{{ $contrat->date_creation }}"
					placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="date_creation">Date de création</label>
			</div>
			<div class="input-container half ic2">
				<select class="input" id="type" name="type" required>
					<option value="" disabled>* Choisir le type de contrat *</option>
					<option value="{{ $contrat->type }}" selected>{{ $contrat->type }}</option>
					<option value="Habitation">Habitation</option>
					<option value="Prévoyance">Prévoyance</option>
					<option value="Santé">Santé</option>
					<option value="Véhicule">Véhicule</option>
				</select>
				<div class="cut"></div>
				<label class="placeholder" for="type">Type</label>
			</div>
			<div class="input-container half ic2">
				<input class="input" id="date_debut" name="date_debut" type="date" value="{{ $contrat->date_debut }}"
					placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="date_debut">Date de début</label>
			</div>
			<div class="input-container half ic2">
				<input class="input" id="date_fin" name="date_fin" type="date" value="{{ $contrat->date_fin }}"
					placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="date_fin">Date de fin</label>
			</div>
			<div class="input-container half ic2">
				<input class="input" id="prix" name="prix" type="number" value="{{ $contrat->prix }}" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="prix">Prix</label>
			</div>
			<div class="input-container half ic2">
				<input class="input" id="niveau" name="niveau" type="number" value="{{ $contrat->niveau }}" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="niveau">Niveau</label>
			</div>
			<div class="input-container ic2">
				<input class="input" id="option_contrat" name="option_contrat" type="text" value="{{ $contrat->option_contrat }}"
					placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="option_contrat">Option</label>
			</div>
			<button class="submit" type="submit">Enregistrer</button>
		</form>
	</div>

@endsection
