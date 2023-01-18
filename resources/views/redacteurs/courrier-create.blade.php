@extends('redacteurs.base-redacteur')

@section('title', 'Création d\'un nouveau courrier')

@section('css')
	<link href="/css/base.css" rel="stylesheet">
@endsection

@section('content')

	<div class="container-fluid">
		<form class="form" method="POST" action="/redacteur/courriers/create">
			@csrf
			<div class="subtitle">Nouveau courrier</div>
			<div class="input-container ic2">
				<input class="input" id="date" name="date" type="date" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="date">Date de rédaction</label>
			</div>
			<div class="input-container ic2">
				<input class="input" id="description" name="description" type="text" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="description">Description</label>
			</div>
			<button class="submit" type="submit">Enregistrer</button>
		</form>
	</div>

@endsection
