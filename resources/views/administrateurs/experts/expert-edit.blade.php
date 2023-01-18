@extends('administrateurs.base-admin')

@section('title', 'Modification de expert')

@section('css')
	<link href="/css/base.css" rel="stylesheet">
@endsection

@section('content')

	<div class="container-fluid">
		<form class="form" method="POST" action="/admin/experts/{{ $expert->id }}/edit">
			@csrf
			<div class="title">Modification</div>
			<div class="subtitle">Rédacteurs</div>
			<div class="input-container ic2">
				<input class="input" id="nom" name="nom" type="text" value="{{ $expert->nom }}" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="nom">Nom</label>
			</div>
			<div class="input-container ic1">
				<input class="input" id="prenoms" name="prenoms" type="text" value="{{ $expert->prenoms }}"
					placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="prenoms">Prénoms</label>
			</div>
			<div class="input-container ic2">
				<input class="input" id="email" name="email" type="email" value="{{ $expert->email }}" placeholder=" " />
				<div class="cut cut-short"></div>
				<label class="placeholder" for="email">Email<label />
			</div>
			<div class="input-container ic2">
				<input class="input" id="motdepasse" name="motdepasse" type="password" value="{{ $expert->motdepasse }}"
					placeholder=" " />
				<div class="cut cut-short"></div>
				<label class="placeholder" for="motdepasse">Mot de passe<label />
			</div>
			<div class="input-container ic2">
				<input class="input" id="confirmation" name="confirmation" type="password" value="{{ $expert->motdepasse }}"
					placeholder=" " />
				<div class="cut cut-short"></div>
				<label class="placeholder" for="confirmation">Confirmation mot de passe<label />
			</div>
			<div class="input-container ic2">
				<input class="input" id="telephone" name="telephone" type="tel" value="{{ $expert->telephone }}"
					placeholder=" " />
				<div class="cut cut-short"></div>
				<label class="placeholder" for="telephone">Téléphone<label />
			</div>
			<button class="submit" type="submit">Enregistrer</button>
		</form>
	</div>

@endsection
