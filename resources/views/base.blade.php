<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<!-- Balises meta -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="title" content="AssureTout | Intranet" />
	<meta name="description" content="AssureTout est une compagnie d'assurance en Côte d'Ivoire"/>
	<meta name="robots" content="index, follow" />

	<!-- Canonical -->
	<link href="https://assuretout.justekouassi.com" rel="canonical">

	<!-- Open graph -->
	<meta property="og:title" content="AssureTout est une compagnie d'assurance en Côte d'Ivoire" />
	<meta property="og:type" content="website" />
	<meta property="og:image" content="https://assuretout.justekouassi.com/favicon.ico" />
	<meta property="og:image:type" content="image/jpeg" />
	<meta property="og:image:width" content="400" />
	<meta property="og:image:height" content="400" />
	<meta property="og:url" content="https://assuretout.justekouassi.com" />
	<meta property="og:description" content="AssureTout est une compagnie d'assurance en Côte d'Ivoire" />

	<!-- Favicon --->
	<link href="/images/favicon_io/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180">
	<link type="image/png" href="/images/favicon_io/favicon-32x32.png" rel="icon" sizes="32x32">
	<link type="image/png" href="/images/favicon_io/favicon-16x16.png" rel="icon" sizes="16x16">
	<link href="/images/favicon_io/site.webmanifest" rel="manifest">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<!-- Bootstrap css -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Jquery datatable css -->
	<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
	<!-- Perso css -->
	<link href="/vendor/all.min.css" rel="stylesheet">
	<link href="/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="/css/base.css" rel="stylesheet" />

	@yield('css')

	<title>@yield('title') | {{ env('APP_NAME') }}</title>
</head>

<body>
	<h1>Hello world !</h1>

	@yield('javascript')
</body>

</html>
