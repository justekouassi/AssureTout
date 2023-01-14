@extends('base')

@section('Affichage sinistre', 'Inscription')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="float-right mt-1" aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/">Accueil</a></li>
						<li class="breadcrumb-item"><a href="/browse">Tableau</a></li>
						<li class="breadcrumb-item active" aria-current="page"><a>Sinistre N°{{ $sinistre->id }}</a></li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="d-flex mb-2">
							<h5 class="header-title mt-0 mb-1">Sinistre N°{{ $sinistre->id }}</h5>
						</div>

						<div class="row">
							<div class="col">
								<div class="form-group row">
									<label class="col-lg-2 col-form-label" for="sinistre">Sinistre</label>
									<div class="col-lg-10">
										<input class="form-control mb-2" type="text" value="{{ $sinistre->sinistre }}">
									</div>
									<label class="col-lg-2 col-form-label" for="reponse">Réponse</label>
									<div class="col-lg-10">
										<input class="form-control mb-2" id="reponse" name="reponse" type="text" value="{{ $sinistre->reponse }}">
									</div>
									<label class="col-lg-2 col-form-label" for="categorie">Catégorie</label>
									<div class="col-lg-10">
										<input class="form-control mb-2" type="text" value="{{ $sinistre->categorie }}">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
