<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="/img/favicon_io/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180">
	<link type="image/png" href="/img/favicon_io/favicon-32x32.png" rel="icon" sizes="32x32">
	<link type="image/png" href="/img/favicon_io/favicon-16x16.png" rel="icon" sizes="16x16">
	<link href="/site.webmanifest" rel="manifest">

	<link href="/css/all.min.css" rel="stylesheet">
	<link href="/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="/css/dataTables.bootstrap4.css" rel="stylesheet">
	@yield('css')
	
	<title>@yield('title') | {{ env('APP_NAME') }}</title>
</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/courtier">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-house-user"></i>
				</div>
				<div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">
			<!-- Nav Item - Dashboard -->
			<li class="nav-item {{ request()->is('courtier') ? 'active' : '' }}">
				<a class="nav-link" href="/courtier">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span>
				</a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">
			<!-- Heading -->
			<div class="sidebar-heading">
				Employés
			</div>

			<!-- Nav Item - Tables -->
			<li class="nav-item {{ request()->is('courtier/sinistres') ? 'active' : '' }}">
				<a class="nav-link" href="/courtier/sinistres">
					<i class="fas fa-fw fa-table"></i>
					<span>Sinistres</span>
				</a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">
			<!-- Heading -->
			<div class="sidebar-heading">
				Clients
			</div>

			<!-- Nav Item - Tables -->
			<li class="nav-item {{ request()->is('courtier/clients') ? 'active' : '' }}">
				<a class="nav-link" href="/courtier/clients">
					<i class="fas fa-fw fa-table"></i>
					<span>Clients</span>
				</a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">
			<!-- Sidebar Toggler (Sidebar) -->
			<div class="d-none d-md-inline text-center">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div class="d-flex flex-column" id="content-wrapper">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light topbar static-top mb-4 bg-white shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<div class="form-inline">
						<button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop">
							<i class="fa fa-bars"></i>
						</button>
					</div>

					<!-- Topbar Search -->
					<form class="d-none d-sm-inline-block form-inline ml-md-3 my-md-0 mw-100 navbar-search my-2 mr-auto">
						<div class="input-group">
							<input class="form-control bg-light small border-0" type="search" aria-label="Search"
								aria-describedby="basic-addon2" placeholder="Recherche ...">
							<div class="input-group-append">
								<button class="btn btn-primary" type="button">
									<i class="fas fa-search fa-sm"></i>
								</button>
							</div>
						</div>
					</form>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" id="searchDropdown" data-toggle="dropdown" href="#" role="button"
								aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-menu dropdown-menu-right animated--grow-in p-3 shadow" aria-labelledby="searchDropdown">
								<form class="form-inline w-100 navbar-search mr-auto">
									<div class="input-group">
										<input class="form-control bg-light small border-0" type="search" aria-label="Search"
											aria-describedby="basic-addon2" placeholder="Recherche ...">
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>

						<!-- Nav Item - Role -->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link">
								{{ auth()->user()->role }}
							</a>
						</li>

						<div class="topbar-divider d-none d-sm-block"></div>
						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" id="userDropdown" data-toggle="dropdown" href="#" role="button"
								aria-haspopup="true" aria-expanded="false">
								<span class="d-none d-lg-inline small mr-4 text-gray-600">{{ auth()->user()->prenoms }}
									{{ auth()->user()->nom }}</span>
								<img class="img-profile rounded-circle" src="/img/undraw_profile.svg">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right animated--grow-in shadow" aria-labelledby="userDropdown">
								<a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" href="#">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Déconnexion
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->

				@yield('content')

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright my-auto text-center">
						<span>Copyright &copy; {{ env('APP_NAME') }} {{ date('Y') }}</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
		tabindex="-1">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Déconnexion ?</h5>
					<button class="close" data-dismiss="modal" type="button" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Cliquez sur le bouton "Se déconnecter" si vous voulez mettre fin à votre session</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" data-dismiss="modal" type="button">Annuler</button>
					<a class="btn btn-primary" href="/logout">Se déconnecter</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.bundle.min.js"></script>
	<!-- Core plugin JavaScript-->
	<script src="/js/jquery.easing.js"></script>
	<!-- Custom scripts for all pages-->
	<script src="/js/sb-admin-2.js"></script>
	<!-- Page level plugins -->
	<script src="/js/jquery.dataTables.min.js"></script>
	<script src="/js/dataTables.bootstrap4.js"></script>
	<script>
		$(document).ready(function() {
			$('.table').DataTable({
				language: {
					url: "{{ asset('/js/datatable-french.json') }}"
				},
			});
		});
	</script>
	<!-- Page level plugins -->
	<script src="/js/Chart.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="/js/chart-area-demo.js"></script>
	<script src="/js/chart-pie-demo.js"></script>

</body>

</html>
