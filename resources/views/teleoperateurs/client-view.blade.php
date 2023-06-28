@extends('teleoperateurs.base-teleoperateur')

@section('title', 'Informations client')

@section('css')
	<link href="/css/base.css" rel="stylesheet">
@endsection

@section('content')

	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-center mb-4">
			<h1 class="h3 mb-0 text-gray-800">Informations client N°</h1>
		</div>
		<form class="form" method="POST" action="/teleoperateur/clients/{{ $client->id }}/edit">
			@csrf
			<div class="input-container half ic2">
				<input class="input" id="nom" name="nom" type="text" value="{{ $client->nom }}" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="nom">Nom</label>
			</div>
			<div class="input-container half ic2">
				<input class="input" id="prenoms" name="prenoms" type="text" value="{{ $client->prenoms }}"
					placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="prenoms">Prénoms</label>
			</div>
			<div class="input-container half ic2">
				<input class="input" id="email" name="email" type="email" value="{{ $client->email }}" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="email">Email<label />
			</div>
			<div class="input-container half ic2">
				<input class="input" id="telephone" name="telephone" type="tel" value="{{ $client->telephone }}"
					placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="telephone">Téléphone<label />
			</div>
			<button class="submit modification" type="submit">Enregistrer</button>
		</form>
	</div>

@endsection
