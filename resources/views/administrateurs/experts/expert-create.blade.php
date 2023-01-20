@extends('administrateurs.base-admin')

@section('title', 'Création d\'un expert')

@section('css')
	<link href="/css/base.css" rel="stylesheet">
@endsection

@section('content')

	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-center mb-4">
			<h1 class="h3 mb-0 text-gray-800">Création d'un expert</h1>
		</div>
		<form class="form" method="POST" action="/admin/experts/create">
			@csrf
			<div class="input-container half ic2">
				<input class="input" id="nom" name="nom" type="text" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="nom">Nom<label />
			</div>
			<div class="input-container half ic2">
				<input class="input" id="prenoms" name="prenoms" type="text" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="prenoms">Prénoms</label>
			</div>
			<div class="input-container half ic2">
				<input class="input" id="email" name="email" type="email" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="email">E-mail</label>
			</div>
			<div class="input-container half ic2">
				<input class="input" id="telephone" name="telephone" type="tel" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="telephone">Téléphone</label>
			</div>
			<div class="input-container half ic2">
				<input class="input" id="motdepasse" name="motdepasse" type="password" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="motdepasse">Mot de passe</label>
			</div>
			<div class="input-container half ic2">
				<input class="input" id="confirmation" name="confirmation" type="password" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="confirmation">Confirmation</label>
			</div>
			<div class="input-container ic2">
				<input class="input" id="domaine" name="domaine" type="text" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="domaine">Domaine d'expertise</label>
			</div>
			<button class="submit" type="submit">Enregistrer</button>
		</form>
	</div>

@endsection
