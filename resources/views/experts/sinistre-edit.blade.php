@extends('courtiers.base-courtier')

@section('title', "Modification d'un sinistre")

@section('css')
	<link href="/css/base.css" rel="stylesheet">
@endsection

@section('content')

	<div class="container-fluid">
		<form class="form" method="POST" action="/expert/sinistres/{{ $sinistre->id }}/edit">
			@csrf
			<div class="title">Inscription</div>
			<div class="subtitle">Sinistre N°{{ $sinistre->id }}</div>
			<div class="input-container ic2">
				<input class="input" id="date" name="date" type="date" value="{{ $sinistre->date_declaration }}"
					placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="date">Date de déclaration</label>
			</div>
			<div class="input-container ic2">
				<input class="input" id="montant" name="montant" type="number" value="{{ $sinistre->montant }}"
					placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="montant">Montant de remboursement</label>
			</div>
			<div class="input-container ic2">
				<input id="scan" name="scan" type="file" value="{{ $sinistre->scan }}" placeholder=" " />
				<div class="cut cut-short"></div>
				<label class="placeholder" for="scan">Scan<label />
			</div>
			<div class="input-container ic2">
				<input class="input" id="transcription" name="transcription" type="text" value="{{ $sinistre->transcription }}"
					placeholder=" " />
				<div class="cut cut-short"></div>
				<label class="placeholder" for="transcription">Transcription<label />
			</div>
			<button class="submit" type="submit">Enregistrer</button>
		</form>
	</div>

@endsection
