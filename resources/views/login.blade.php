<!DOCTYPE html>
<html lang="fr-FR">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="css/base.css" rel="stylesheet">
	<title>Connexion | AssureTout</title>
</head>

<body style="display: flex; justify-content: center; align-items: center">

	<div class="container-fluid">
		<form class="form" method="POST" action="/login">
			@csrf
			<div class="title">Connexion</div>
			<div class="input-container ic2">
				<input class="input" id="email" name="email" type="email" value="{{ old('email') }}" placeholder=" " />
				<div class="cut cut-short"></div>
				<label class="placeholder" for="email">Email<label />
			</div>
			@if ($errors->has('email'))
				<p style="color: red">{{ $errors->first('email') }}</p>
			@endif
			<div class="input-container ic2">
				<input class="input" id="motdepasse" name="password" type="password" value="{{ old('password') }}"
					placeholder=" " />
				<div class="cut cut-short"></div>
				<label class="placeholder" for="motdepasse">Mot de passe<label />
			</div>
			@if ($errors->has('password'))
				<p style="color: red">{{ $errors->first('password') }}</p>
			@endif
			<button class="submit" type="submit">Se connecter</button>
		</form>
	</div>

</body>

</html>
