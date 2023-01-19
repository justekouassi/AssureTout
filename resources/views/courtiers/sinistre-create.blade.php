@extends('courtiers.base-courtier')

@section('title', 'Création d\'un nouveau sinistre')

@section('css')
	<link href="/css/base.css" rel="stylesheet">
@endsection

@section('content')

	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-center mb-4">
			<h1 class="h3 mb-0 text-gray-800">Création d'un sinistre</h1>
		</div>

		<form class="form" method="POST" action="/courtier/sinistres/create">
			@csrf
			<div class="input-container ic2">
				<input class="input" id="date_declaration" name="date_declaration" type="date" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="date_declaration">Date de déclaration</label>
			</div>
			<div class="input-container ic2">
				<input class="input" id="scan_courrier" name="scan_courrier" type="file" placeholder=" " />
				<div class="cut"></div>
				<label class="placeholder" for="scan_courrier">Scan courrier<label />
			</div>
			<button class="submit" type="submit">Enregistrer</button>
		</form>
	</div>

@endsection
