@extends('base')

@section('title', 'Ajout d\'une nouvelle question')

@section('content')

<div class="container">
	<div class="row">
		<nav aria-label="breadcrumb" class="float-right mt-1">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Accueil</a></li>
				<li class="breadcrumb-item"><a href="/browse">Tableau</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a>Ajout d'une question</a></li>
			</ol>
		</nav>
	</div>
	<div class="card">
		<div class="text-center mb-2">
			<h5 class="mt-2 mb-1">Ajouter une question</h5>
		</div>

		<form method="post" action="/add_new_question">
			@csrf
			<label class="form-label" for="question">Question</label>
			<div class="input-group">
				<input required type="text" class="form-control mb-2" id="question" name="question">
			</div>
			<label class="form-label" for="reponse">Réponse</label>
			<div class="input-group">
				<input required type="text" class="form-control mb-2" id="reponse" name="reponse">
			</div>
			<label class="form-label" for="categorie">Catégorie</label>
			<div class="input-group">
				<input type="text" class="form-control mb-2" id="categorie" name="categorie">
			</div>
			<label class="form-label" for="explication">Explication</label>
			<div class="input-group">
				<input type="text" class="form-control mb-2" id="explication" name="explication">
			</div>
			<label class="form-label" for="wiki">Lien wiki</label>
			<div class="input-group">
				<input type="url" class="form-control mb-2" id="wiki" name="wiki">
			</div>
			<label class="form-label" for="media">Lien media</label>
			<div class="input-group">
				<input type="url" class="form-control mb-2" id="media" name="media">
			</div>
			<button type="submit" class="btn btn-primary mb-2">Enregistrer</button>
		</form>
	</div>
</div>

@endsection