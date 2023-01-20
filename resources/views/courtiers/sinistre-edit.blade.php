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
		<div class="row">
			<form class="form mb-2" method="POST" action="/courtier/sinistres/{{ $sinistre->id }}/edit"
				enctype="multipart/form-data">
				@csrf
				<div class="input-container half ic2">
					<input class="input" id="date_declaration" name="date_declaration" type="date"
						value="{{ $sinistre->date_declaration }}" placeholder=" " />
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
					<input class="input" id="scan_courrier" name="scan_courrier" type="file" placeholder=" " accept="image/*" />
					<div class="cut"></div>
					<label class="placeholder" for="scan_courrier">Scan<label />
				</div>
				<div class="input-container half ic2">
					<input class="input" id="scan_contestation" name="scan_contestation" type="file" placeholder=" "
						accept="image/*" />
					<div class="cut"></div>
					<label class="placeholder" for="scan_contestation">Contestation<label />
				</div>
				<button class="submit" type="submit">Enregistrer</button>
			</form>
			<img class="col-lg-6" src="/storage/{{ $sinistre->scan_courrier ?? '' }}" alt="Courrier" width="100px" />
			<img class="col-lg-6" src="/storage/{{ $sinistre->scan_contestation ?? '' }}" alt="Contestation" width="100px" />
		</div>
	</div>

@endsection
