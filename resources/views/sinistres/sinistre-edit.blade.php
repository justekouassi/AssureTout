@extends('courtiers.base-courtier')

@section('title', 'Création d\'un nouveau sinistre')

@section('css')
	<link href="/css/base.css" rel="stylesheet">
@endsection

@section('content')

	<div class="container-fluid">
		<form class="form" method="POST" action="/courtier/sinistres/create">
			@csrf
			<div class="title">Inscription</div>
			<div class="subtitle">Sinistres</div>
			<div class="input-container ic2">
				<input class="input" id="date" name="date" type="date" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="date">Date de déclaration</label>
			</div>
			<div class="input-container ic2">
				<input class="input" id="montant" name="montant" type="number" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="montant">Montant de remboursement</label>
			</div>
			<div class="input-container ic2">
				<select class="input" id="statut" name="statut" required placeholder=" ">
					<option value="" selected disabled>Choisir le statut</option>
					<option value="traitement">En traitement</option>
					<option value="estime">Estimé</option>
					<option value="rembourse">Remboursé</option>
				</select>
				<div class="cut cut-short"></div>
				<label class="placeholder" for="statut">Statut</label>
			</div>
			<div class="input-container ic2">
				<input id="scan" name="scan" type="file" placeholder=" " />
				<div class="cut cut-short"></div>
				<label class="placeholder" for="scan">Scan<label />
			</div>
			<div class="input-container ic2">
				<input class="input" id="contentieux" name="contentieux" type="checkbox" placeholder=" " />
				<div class="cut cut-short"></div>
				<label class="placeholder" for="contentieux">Ce sinistre est-il un contentieux ?<label />
			</div>
			<div class="input-container ic2">
				<input class="input" id="transcription" name="transcription" type="text" placeholder=" " />
				<div class="cut cut-short"></div>
				<label class="placeholder" for="transcription">Transcription<label />
			</div>
			<button class="submit" type="submit">Enregistrer</button>
		</form>
	</div>

@endsection
