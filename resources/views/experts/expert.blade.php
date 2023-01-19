@extends('experts.base-expert')

@section('title', 'Expert')

@section('content')

	<div class="container-fluid">

		<div class="d-sm-flex align-items-center justify-content-between mb-2">
			<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
			<a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="javascript:void(0)">
				<i class="fas fa-download fa-sm text-white-50"></i> Générer rapport
			</a>
		</div>

		<!-- Content Row -->
		<div class="row">

			<!-- Experts Card Example -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary h-100 py-2 shadow">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="font-weight-bold text-primary text-uppercase mb-1 text-xs">
									<a href="/expert/sinistres" style="color: unset; text-decoration: none">
										Sinistres
									</a>
								</div>
								<div class="h5 font-weight-bold mb-0 text-gray-800">{{ $sinistres->count() }}</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-calendar fa-2x text-gray-300"></i>
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
						<h6 class="font-weight-bold text-primary m-0">Evolution du nombre de courriers enregistrés</h6>
						<div class="dropdown no-arrow">
							<a class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" href="#" role="button"
								aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right animated--fade-in shadow" aria-labelledby="dropdownMenuLink">
								<div class="dropdown-header">Dropdown Header:</div>
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
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
						<h6 class="font-weight-bold text-primary m-0">Ratio contentieux</h6>
						<div class="dropdown no-arrow">
							<a class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" href="#" role="button"
								aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right animated--fade-in shadow" aria-labelledby="dropdownMenuLink">
								<div class="dropdown-header">Dropdown Header:</div>
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
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
								<i class="fas fa-circle text-primary"></i> Direct
							</span>
							<span class="mr-2">
								<i class="fas fa-circle text-success"></i> Social
							</span>
							<span class="mr-2">
								<i class="fas fa-circle text-info"></i> Referral
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

@endsection
