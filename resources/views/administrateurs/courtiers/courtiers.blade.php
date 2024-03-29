@extends('administrateurs.base-admin')

@section('title', 'Courtiers')

@section('content')

	<div class="container-fluid">

		<div class="d-sm-flex align-items-center justify-content-between mb-2">
			<h1 class="h3 mb-2 text-gray-800">Courtiers</h1>
			<a class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm" href="/admin/courtiers/create">Ajouter</a>
		</div>

		<div class="card mb-4 shadow">
			<div class="card-header py-3">
				<h6 class="font-weight-bold text-primary m-0">Liste des courtiers</h6>
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
							@foreach ($courtiers as $courtier)
								<tr>
									<td>{{ $courtier->nom }}</td>
									<td>{{ $courtier->prenoms }}</td>
									<td>{{ $courtier->email }}</td>
									<td>{{ $courtier->telephone }}</td>
									<td>
										<a class="btn btn-primary btn-sm" href="/admin/courtiers/{{ $courtier->id }}/edit">
											<i class="fa fa-pen"></i>
										</a>
										<a class="btn btn-danger btn-sm suppression" href="/admin/courtiers/{{ $courtier->id }}/delete">
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
