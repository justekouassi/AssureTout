<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\ContentieuxController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\ContratHabitationController;
use App\Http\Controllers\ContratPrevoyanceController;
use App\Http\Controllers\ContratSanteController;
use App\Http\Controllers\ContratVehiculeController;
use App\Http\Controllers\CourtierController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\RedacteurController;
use App\Http\Controllers\ServiceClientController;
use App\Http\Controllers\SinistreController;

/* Accueil */

Route::get('/', function () {
	return view('welcome');
})->name('index');

/* Connexion */

Route::get('/login', function () {
	return view('login');
})->name('login');
Route::post('/login', [ConnexionController::class, 'connexion']);

/* Mot de passe */

Route::get('/change-password', function () {
	return view('change-password');
});
Route::post('/change-password', [ConnexionController::class, 'nouveauMdp']);

// Route::group([
// 	'middleware' => 'auth',
// ], function () {

	/* dashboard administrateur */

	Route::get('/admin', function () {
		return view('administrateurs.admin');
	})->name('admin');

	/* inscription employés */

	Route::get('/signup', function () {
		return view('signup');
	});
	Route::post('/signup', [ConnexionController::class, 'inscription'])->name('signup');

	/* opérations de l'administrateur sur le service contentieux */

	Route::get('/admin/contentieux', function () {
		return view('administrateurs.contentieux.contentieux');
	});
	Route::get('/contentieux/create', function () {
		return view('contentieux.contentieux-create');
	});
	Route::post('/contentieux/create', [ContentieuxController::class, 'ajouter']);
	Route::get('/contentieux/{id}/edit', [ContentieuxController::class, 'consulter']);
	Route::post('/contentieux/{id}/edit', [ContentieuxController::class, 'modifier']);
	Route::get('/contentieux/{id}/delete', [ContentieuxController::class, 'supprimer']);

	/* opérations de l'administrateur sur les courtiers */

	Route::get('/admin/courtiers', function () {
		return view('administrateurs.courtiers.courtiers');
	});
	Route::get('/courtiers/create', function () {
		return view('courtiers.courtier-create');
	});
	Route::post('/courtiers/create', [CourtierController::class, 'ajouter']);
	Route::get('/courtiers/{id}/edit', [CourtierController::class, 'consulter']);
	Route::post('/courtiers/{id}/edit', [CourtierController::class, 'modifier']);
	Route::get('/courtiers/{id}/delete', [CourtierController::class, 'supprimer']);

	/* opérations de l'administrateur sur les experts */

	Route::get('/admin/experts', function () {
		return view('administrateurs.experts.experts');
	});
	Route::get('/experts/create', function () {
		return view('experts.expert-create');
	});
	Route::post('/experts/create', [ExpertController::class, 'ajouter']);
	Route::get('/experts/{id}/edit', [ExpertController::class, 'consulter']);
	Route::post('/experts/{id}/edit', [ExpertController::class, 'modifier']);
	Route::get('/experts/{id}/delete', [ExpertController::class, 'supprimer']);

	/* opérations de l'administrateur sur les rédacteurs */

	Route::get('/admin/redacteurs', function () {
		return view('administrateurs.redacteurs.redacteurs');
	});
	Route::get('/redacteurs/create', function () {
		return view('redacteurs.redacteur-create');
	});
	Route::post('/redacteurs/create', [RedacteurController::class, 'ajouter']);
	Route::get('/redacteurs/{id}/edit', [RedacteurController::class, 'consulter']);
	Route::post('/redacteurs/{id}/edit', [RedacteurController::class, 'modifier']);
	Route::get('/redacteurs/{id}/delete', [RedacteurController::class, 'supprimer']);

	/* opérations de l'administrateur sur le service clients */

	Route::get('/admin/service-clients', function () {
		return view('administrateurs.service_clients.service-clients');
	});
	Route::get('/service-clients/create', function () {
		return view('service-clients.service-client-create');
	});
	Route::post('/service-clients/create', [ServiceClientController::class, 'ajouter']);
	Route::get('/service-clients/{id}/edit', [ServiceClientController::class, 'consulter']);
	Route::post('/service-clients/{id}/edit', [ServiceClientController::class, 'modifier']);
	Route::get('/service-clients/{id}/delete', [ServiceClientController::class, 'supprimer']);

	/* opérations de l'administrateur sur les clients */

	Route::get('/admin/clients', function () {
		return view('administrateurs.clients.clients');
	});
	Route::get('/clients/create', function () {
		return view('clients.client-create');
	});
	Route::post('/clients/create', [ServiceClientController::class, 'ajouter']);
	Route::get('/clients/{id}/edit', [ServiceClientController::class, 'consulter']);
	Route::post('/clients/{id}/edit', [ServiceClientController::class, 'modifier']);
	Route::get('/clients/{id}/delete', [ServiceClientController::class, 'supprimer']);

	/* opérations du service contentieux */

	Route::get('/contentieux', function () {
		return view('service_contentieux.contentieux');
	});
	Route::get('/contentieux/{id}', [ContentieuxController::class, 'consulter']);

	/* opérations des courtiers */

	Route::get('/courtier', function () {
		return view('courtiers.courtier');
	});
	Route::get('/courtier/sinistres', function () {
		return view('sinistres.sinistres');
	});

	/* opérations des rédacteurs */

	Route::get('/redacteur', function () {
		return view('redacteurs.redacteur');
	});
	Route::get('/experts', function () {
		return view('redacteurs.experts');
	});
	Route::get('/experts/{id}', [ExpertController::class, 'affecter']);

	/* opérations du service clients */

	Route::get('/service-clients', function () {
		return view('service_clients.service_client');
	});
	Route::get('/clients', function () {
		return view('service_clients.clients');
	});
	Route::get('/clients/{id}', [ClientController::class, 'consulter']);
	Route::get('/offres', function () {
		return view('service_clients.offres');
	});

	/* opérations sinistres */

	Route::get('/sinistres/create', function () {
		return view('sinistres.sinistre-create');
	});
	Route::post('/sinistres/create', [SinistreController::class, 'ajouter']);
	Route::get('/sinistres/{id}/edit', [SinistreController::class, 'consulter']);
	Route::post('/sinistres/{id}/edit', [SinistreController::class, 'modifier']);
	Route::get('/sinistres/{id}/delete', [SinistreController::class, 'supprimer']);
// });
