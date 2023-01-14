@extends('base')

@section('title', 'Modification d\'une question')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<nav aria-label="breadcrumb" class="float-right mt-1">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/accueil">Accueil</a></li>
					<li class="breadcrumb-item"><a href="/cours">Tableau</a></li>
					<li class="breadcrumb-item active" aria-current="page"><a>Question</a></li>
				</ol>
			</nav>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="text-center mb-2">
						<h4 class="mt-0 mb-1">Modifier une question</h4>
					</div>

					<form method="post" action="/question/{{$question->id}}/edit_question">
						@csrf
						
						<div class="row">
							<div class="col">
								<div class="form-group row">
									<label class="col-lg-2 col-form-label" for="question">Question</label>
									<div class="col-lg-10">
										<input required type="text" class="form-control mb-2" id="question" name="question" value="{{$question->question}}">
									</div>
									<label class="col-lg-2 col-form-label" for="reponse">Réponse</label>
									<div class="col-lg-10">
										<input required type="text" class="form-control mb-2" id="reponse" name="reponse" value="{{$question->reponse}}">
									</div>
									<label class="col-lg-2 col-form-label" for="categorie">Catégorie</label>
									<div class="col-lg-10">
										<input type="text" class="form-control mb-2" id="categorie" name="categorie" value="{{$question->categorie}}">
									</div>
									<label class="col-lg-2 col-form-label" for="explication">Explication</label>
									<div class="col-lg-10">
										<input type="text" class="form-control mb-2" id="explication" name="explication" value="{{$question->explication}}">
									</div>
									<label class="col-lg-2 col-form-label" for="wiki">Lien wiki</label>
									<div class="col-lg-10">
										<input type="text" class="form-control mb-2" id="wiki" name="wiki" value="{{$question->wiki}}">
									</div>
									<label class="col-lg-2 col-form-label" for="media">Lien media</label>
									<div class="col-lg-10">
										<input type="text" class="form-control mb-2" id="media" name="media" value="{{$question->media}}">
									</div>
								</div>
								<button type="submit" class="btn btn-primary modification">Enregistrer les modifications</button>
								<button class="btn btn-danger"><a href="/browse" style="color: white">Annuler</a></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('javascript')

	<script src="js/app.js"></script>

@endsection