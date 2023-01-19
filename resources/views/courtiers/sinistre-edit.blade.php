@extends('courtiers.base-courtier')

@section('title', "Modification d'un sinistre")

@section('css')
	<link href="/css/base.css" rel="stylesheet">
@endsection

@section('content')

	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-center mb-4">
			<h1 class="h3 mb-0 text-gray-800">Sinistre N°{{ $sinistre->id }}</h1>
		</div>
		<form class="form" method="POST" action="/courtier/sinistres/{{ $sinistre->id }}/edit">
			@csrf
			<div class="input-container half ic2">
				<input class="input" id="date" name="date" type="date" value="{{ $sinistre->date_declaration }}"
					placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="date">Date de déclaration</label>
			</div>
			<div class="input-container half ic2">
				<input class="input" id="montant" name="montant" type="number" value="{{ $sinistre->montant }}" placeholder=" "
					disabled />
				<div class="cut"></div>
				<label class="placeholder" for="montant">Montant de remboursement</label>
			</div>
			<div class="input-container half ic2">
				<input class="input" id="scan" name="scan" type="file" value="{{ $sinistre->scan }}" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="scan">Scan<label />
			</div>
			<div class="input-container half ic2">
				<input class="input" id="contestation" name="contestation" type="file" value="{{ $sinistre->scan }}"
					placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="contestation">Contestation<label />
			</div>
			<button class="submit" type="submit">Enregistrer</button>
		</form>
	</div>

@endsection
