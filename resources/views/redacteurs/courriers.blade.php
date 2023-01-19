@extends('redacteurs.base-redacteur')

@section('title', 'Courriers')

@section('content')

	<div class="container-fluid">

		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-2 text-gray-800">Courriers</h1>
			<a class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm" href="/redacteur/courriers/create">Ajouter</a>
		</div>

		<div class="card mb-4 shadow">
			<div class="card-header py-3">
				<h6 class="font-weight-bold text-primary m-0">Liste des courriers</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Date de rédaction</th>
								<th>Description</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Date de rédaction</th>
								<th>Description</th>
								<th>Actions</th>
							</tr>
						</tfoot>
						<tbody>
							@php $courriers = \App\Models\Courrier::all(); @endphp
							@foreach ($courriers as $courrier)
								<tr>
									<td>{{ $courrier->date }}</td>
									<td>{{ $courrier->description }}</td>
									<td>
										<a class="btn btn-primary btn-sm" href="/redacteur/courriers/{{ $courrier->id }}/edit">
											<i class="fa fa-pen"></i>
										</a>
										<a class="btn btn-danger btn-sm suppression" href="/redacteur/courriers/{{ $courrier->id }}/delete">
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
