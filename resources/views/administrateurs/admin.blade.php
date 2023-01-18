@extends('administrateurs.base-admin')

@section('title', 'Administration')

@section('content')

	<div class="container-fluid">

		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
			<a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="javascript:void(0)">
				<i class="fas fa-download fa-sm text-white-50"></i> Générer rapport
			</a>
		</div>

		<!-- Content Row -->
		<div class="row">

			<!-- Rédacteurs Card Example -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary h-100 py-2 shadow">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="font-weight-bold text-primary text-uppercase mb-1 text-xs">
									<a href="/admin/redacteurs" style="color: unset; text-decoration: none">
										Rédacteurs
									</a>
								</div>
								<div class="h5 font-weight-bold mb-0 text-gray-800" id="redacteurs">{{ $redacteurs->count() }}</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-calendar fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Rédacteurs Card Example -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-success h-100 py-2 shadow">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="font-weight-bold text-success text-uppercase mb-1 text-xs">
									<a href="/admin/experts" style="color: unset; text-decoration: none">
										Experts
									</a>
								</div>
								<div class="h5 font-weight-bold mb-0 text-gray-800" id="experts">{{ $experts->count() }}</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Pending Requests Card Example -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-warning h-100 py-2 shadow">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="font-weight-bold text-warning text-uppercase mb-1 text-xs">
									<a href="/admin/courtiers" style="color: unset; text-decoration: none">
										Courtiers
									</a>
								</div>
								<div class="h5 font-weight-bold mb-0 text-gray-800" id="courtiers">{{ $courtiers->count() }}</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-comments fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Pending Requests Card Example -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-danger h-100 py-2 shadow">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="font-weight-bold text-danger text-uppercase mb-1 text-xs">
									<a href="/admin/teleoperateurs" style="color: unset; text-decoration: none">
										Service clientèle
									</a>
								</div>
								<div class="h5 font-weight-bold mb-0 text-gray-800" id="teleoperateurs">{{ $teleoperateurs->count() }}</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-comments fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Pending Requests Card Example -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-secondary h-100 py-2 shadow">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="font-weight-bold text-secondary text-uppercase mb-1 text-xs">
									<a href="/admin/contentieux" style="color: unset; text-decoration: none">
										Service contentieux
									</a>
								</div>
								<div class="h5 font-weight-bold mb-0 text-gray-800" id="contentieux">{{ $contentieux->count() }}</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-comments fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Pending Requests Card Example -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-info h-100 py-2 shadow">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="font-weight-bold text-info text-uppercase mb-1 text-xs">
									<a href="/admin/clients" style="color: unset; text-decoration: none">
										Clients
									</a>
								</div>
								<div class="h5 font-weight-bold mb-0 text-gray-800" id="clients">{{ $clients->count() }}</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-comments fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<!-- Content Row -->

		<div class="row">

			<!-- Area Chart -->
			<div class="col-xl-8 col-lg-7">
				<div class="card mb-4 shadow">
					<!-- Card Header - Dropdown -->
					<div class="card-header d-flex align-items-center justify-content-between flex-row py-3">
						<h6 class="font-weight-bold text-primary m-0">Evolution des clients</h6>
						<div class="dropdown no-arrow">
							<a class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" href="javascript:void(0)" role="button"
								aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right animated--fade-in shadow" aria-labelledby="dropdownMenuLink">
								<div class="dropdown-header">Dropdown Header:</div>
								<a class="dropdown-item" href="javascript:void(0)">Action</a>
								<a class="dropdown-item" href="javascript:void(0)">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="javascript:void(0)">Something else here</a>
							</div>
						</div>
					</div>
					<!-- Card Body -->
					<div class="card-body">
						<div class="chart-area">
							<canvas id="myAreaChart"></canvas>
						</div>
					</div>
				</div>
			</div>

			<!-- Pie Chart -->
			<div class="col-xl-4 col-lg-5">
				<div class="card mb-4 shadow">
					<!-- Card Header - Dropdown -->
					<div class="card-header d-flex align-items-center justify-content-between flex-row py-3">
						<h6 class="font-weight-bold text-primary m-0">Nombre d'employés par service</h6>
						<div class="dropdown no-arrow">
							<a class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" href="javascript:void(0)" role="button"
								aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right animated--fade-in shadow" aria-labelledby="dropdownMenuLink">
								<div class="dropdown-header">Dropdown Header:</div>
								<a class="dropdown-item" href="javascript:void(0)">Action</a>
								<a class="dropdown-item" href="javascript:void(0)">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="javascript:void(0)">Something else here</a>
							</div>
						</div>
					</div>
					<!-- Card Body -->
					<div class="card-body">
						<div class="chart-pie pt-4 pb-2">
							<canvas id="myPieChart"></canvas>
						</div>
						<div class="small mt-4 text-center">
							<span class="mr-2">
								<i class="fas fa-circle text-primary"></i> Rédacteurs
							</span>
							<span class="mr-2">
								<i class="fas fa-circle text-success"></i> Experts
							</span>
							<span class="mr-2">
								<i class="fas fa-circle text-warning"></i> Courtiers
							</span>
							<span class="mr-2">
								<i class="fas fa-circle text-danger"></i> Service clientèle
							</span>
							<span class="mr-2">
								<i class="fas fa-circle text-secondary"></i> Contentieux
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

@endsection
