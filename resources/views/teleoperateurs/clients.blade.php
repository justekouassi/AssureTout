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
								<th>Statut</th>
								<th>Contestation</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Nom</th>
								<th>Prénoms</th>
								<th>Statut</th>
								<th>Contestation</th>
								<th>Actions</th>
							</tr>
						</tfoot>
						<tbody>
							@php $clients = \App\Models\Client::all(); @endphp
							@foreach ($clients as $client)
								<tr>
									<td>{{ $client->date_declaration }}</td>
									<td>{{ $client->montant }}</td>
									<td>{{ $client->statut }}</td>
									<td>{{ $client->contestation == 0 ? 'Non' : 'Oui' }}</td>
									<td>
										<a class="btn btn-primary btn-sm" href="/teleoperateur/affect/{{ $client->id }}">
											<i class="fa fa-pencil"></i>
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