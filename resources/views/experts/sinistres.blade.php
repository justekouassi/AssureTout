@extends('experts.base-expert')

@section('title', 'Sinistres')

@section('content')

	<div class="container-fluid">

		<h1 class="h3 mb-2 text-gray-800">Sinistres</h1>

		<div class="card mb-4 shadow">
			<div class="card-header py-3">
				<h6 class="font-weight-bold text-primary m-0">Liste des sinistres</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Date de déclaration</th>
								<th>Montant</th>
								<th>Statut</th>
								<th>Contestation</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Date de déclaration</th>
								<th>Montant</th>
								<th>Statut</th>
								<th>Contestation</th>
								<th>Actions</th>
							</tr>
						</tfoot>
						<tbody>
							@foreach ($sinistres as $sinistre)
								<tr>
									<td>{{ $sinistre->date_declaration }}</td>
									<td>{{ $sinistre->montant }}</td>
									<td>{{ $sinistre->statut }}</td>
									<td>{{ $sinistre->contestation == 0 ? 'Non' : 'Oui' }}</td>
									<td>
										<a class="btn btn-primary btn-sm" href="/expert/sinistres/{{ $sinistre->id }}/edit">
											<i class="fas fa-pen"></i>
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
