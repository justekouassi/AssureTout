@extends('administrateurs.base-admin')

@section('title', 'Rédacteurs')

@section('content')

	<div class="container-fluid">

		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-2 text-gray-800">Rédacteurs</h1>
			<a class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm" href="/admin/redacteurs/create">Ajouter</a>
		</div>

		<div class="card mb-4 shadow">
			<div class="card-header py-3">
				<h6 class="font-weight-bold text-primary m-0">Liste des rédacteurs</h6>
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
							@foreach ($redacteurs as $redacteur)
								<tr>
									<td>{{ $redacteur->nom }}</td>
									<td>{{ $redacteur->prenoms }}</td>
									<td>{{ $redacteur->email }}</td>
									<td>{{ $redacteur->telephone }}</td>
									<td>
										<a class="btn btn-primary btn-sm" href="/admin/redacteurs/{{ $redacteur->id }}/edit">
											<i class="fa fa-pen"></i>
										</a>
										<a class="btn btn-danger btn-sm" href="/admin/redacteurs/{{ $redacteur->id }}/delete">
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
