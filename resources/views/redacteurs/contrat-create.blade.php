@extends('redacteurs.base-redacteur')

@section('title', 'Création d\'un nouveau contrat')

@section('css')
	<link href="/css/base.css" rel="stylesheet">
@endsection

@section('content')

	<div class="container-fluid">
		<form class="form" method="POST" action="/redacteur/contrats/create">
			@csrf
			<div class="subtitle">Nouveau contrat</div>
			<div class="input-container ic2">
				<input class="input" id="date_creation" name="date_creation" type="date" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="date_creation">Date de création</label>
			</div>
			<div class="input-container ic2">
				<input class="input" id="date_debut" name="date_debut" type="date" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="date_debut">Date de début</label>
			</div>
			<div class="input-container ic2">
				<input class="input" id="date_fin" name="date_fin" type="date" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="date_fin">Date de fin</label>
			</div>
			<div class="input-container ic2">
				<input class="input" id="prix" name="prix" type="number" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="prix">Prix</label>
			</div>
			<div class="input-container ic2">
				<input class="input" id="statut" name="statut" type="text" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="statut">Statut</label>
			</div>
			<div class="input-container ic2">
				<input class="input" id="type" name="type" type="text" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="type">Type</label>
			</div>
			<div class="input-container ic2">
				<input class="input" id="niveau" name="niveau" type="text" placeholder=" " />
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
