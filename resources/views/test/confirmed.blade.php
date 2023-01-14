<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Confirmation</title>
</head>
<body>
	<form method="POST" action="/signup/{{$user->pseudo_uti}}/{{$user->confirm_key}}">
		@csrf
		<div class="mb-3 text-center d-grid">
			<button class="btn btn-success" type="submit">Confirmer Inscription</button>
		</div>
	</form>
</body>
</html>

<p>Vous êtes connecté</p>
<a href="/login">Connecte-toi</a>