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

	<link href="/css/login.css" rel="stylesheet">
	<title>Intranet | {{ env('APP_NAME') }}</title>
</head>

<body class="body">

	<p class="bienvenue">Bienvenue chez AssureTout</p>
	<img src="/img/assuretout.png" alt="Logo AssureTout" style="position:absolute; z-index: 2; top: 90px" width="70px">
	<form class="form" method="POST" action="/login">
		@csrf
		<div class="title">Connexion</div>
		<div class="input-container">
			<input class="input" id="email" name="email" type="email" value="{{ old('email') }}" placeholder=" " />
			<div class="cut-short"></div>
			<label class="placeholder" for="email">Email<label />
		</div>
		@if ($errors->has('email'))
			<p style="color: red">{{ $errors->first('email') }}</p>
		@endif
		<div class="input-container">
			<input class="input" id="motdepasse" name="motdepasse" type="password" value="{{ old('motdepasse') }}"
				placeholder=" " />
			<div class="cut-short"></div>
			<label class="placeholder" for="motdepasse">Mot de passe<label />
		</div>
		<button class="submit" type="submit">Se connecter</button>
	</form>

</body>

</html>
