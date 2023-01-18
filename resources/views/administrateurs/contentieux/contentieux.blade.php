@extends('administrateurs.base-admin')

@section('title', 'Service contentieux')

@section('content')

	<div class="container-fluid">

		<div style="display: flex; flex-direction:row; justify-content:space-between">
			<h1 class="h3 mb-2 text-gray-800">Service contentieux</h1>
			<a class="btn btn-info" href="/admin/redacteurs/create">Ajouter</a>
		</div>

		<div class="card mb-4 shadow">
			<div class="card-header py-3">
				<h6 class="font-weight-bold text-primary m-0">Liste des chargés des contentieux</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nom</th>
								<th>Prénoms</th>
								<th>Email</th>
								<th>Téléphone</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Nom</th>
								<th>Prénoms</th>
								<th>Email</th>
								<th>Téléphone</th>
								<th>Actions</th>
							</tr>
						</tfoot>
						<tbody>
							@php
								$contentieux = \App\Models\Contentieux::join('utilisateurs', 'contentieux.id_utilisateur', '=', 'utilisateurs.id')->get(['utilisateurs.*']);
							@endphp
							@foreach ($contentieux as $contentieu)
								<tr>
									<td>{{ $contentieu->nom }}</td>
									<td>{{ $contentieu->prenoms }}</td>
									<td>{{ $contentieu->email }}</td>
									<td>{{ $contentieu->telephone }}</td>
									<td>
										<a class="btn btn-primary btn-sm" href="/admin/contentieux/{{ $contentieu->id }}/edit">
											<i class="fa fa-pen"></i>
										</a>
										<a class="btn btn-danger btn-sm" href="/admin/contentieux/{{ $contentieu->id }}/delete">
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
