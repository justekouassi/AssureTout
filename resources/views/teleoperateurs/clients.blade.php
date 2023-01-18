@extends('teleoperateurs.base-teleoperateur')

@section('title', 'Clients')

@section('content')

	<div class="container-fluid">

		<h1 class="h3 mb-2 text-gray-800">Clients</h1>

		<div class="card mb-4 shadow">
			<div class="card-header py-3">
				<h6 class="font-weight-bold text-primary m-0">Liste des clients</h6>
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
							@php $clients = \App\Models\Utilisateur::where('role', 'Client')->get(); @endphp
							@foreach ($clients as $client)
								<tr>
									<td>{{ $client->nom }}</td>
									<td>{{ $client->prenoms }}</td>
									<td>{{ $client->email }}</td>
									<td>{{ $client->telephone }}</td>
									<td>
										<a class="btn btn-primary btn-sm" href="/teleoperateur/client/{{ $client->id }}">
											<i class="fa fa-pen"></i>
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
