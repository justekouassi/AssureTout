@extends('redacteurs.base-redacteur')

@section('title', 'Contrats')

@section('content')

	<div class="container-fluid">

		<div class="d-sm-flex align-items-center justify-content-between mb-2">
			<h1 class="h3 mb-2 text-gray-800">Contrats</h1>
			<a class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm" href="/redacteur/contrats/create">Ajouter</a>
		</div>

		<div class="card mb-4 shadow">
			<div class="card-header py-3">
				<h6 class="font-weight-bold text-primary m-0">Liste des contrats</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Date de création</th>
								<th>Date de début</th>
								<th>Date de fin</th>
								<th>Prix</th>
								<th>Statut</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Date de création</th>
								<th>Date de début</th>
								<th>Date de fin</th>
								<th>Prix</th>
								<th>Statut</th>
								<th>Actions</th>
							</tr>
						</tfoot>
						<tbody>
							@php $contrats = \App\Models\Contrat::all(); @endphp
							@foreach ($contrats as $contrat)
								<tr>
									<td>{{ $contrat->date_creation }}</td>
									<td>{{ $contrat->date_debut }}</td>
									<td>{{ $contrat->date_fin }}</td>
									<td>{{ $contrat->prix }}</td>
									<td>{{ $contrat->statut }}</td>
									<td>
										<a class="btn btn-primary btn-sm" href="/redacteur/contrats/{{ $contrat->id }}/edit">
											<i class="fa fa-pen"></i>
										</a>
										<a class="btn btn-success btn-sm" href="/redacteur/contrats/{{ $contrat->id }}/souscrire">
											<i class="fa fa-pen"></i>
										</a>
										<a class="btn btn-danger btn-sm suppression" href="/redacteur/contrats/{{ $contrat->id }}/refuser">
											<i class="fa fa-trash"></i>
										</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>

@endsection
