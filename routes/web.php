<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
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

	Route::get('/admin', [DashboardController::class, 'index'])->name('admin');

	/* inscription employés */

	Route::get('/signup', function () {
		return view('signup');
	});
	Route::post('/signup', [ConnexionController::class, 'inscription'])->name('signup');

	/* opérations de l'administrateur sur le service contentieux */

	Route::get('/admin/contentieux', function () {
		return view('administrateurs.contentieux.contentieux');
	});
	Route::get('/admin/contentieux/create', function () {
		return view('administrateurs.contentieux.contentieux-create');
	});
	Route::post('/admin/contentieux/create', [ContentieuxController::class, 'ajouter']);
	Route::get('/admin/contentieux/{id}/edit', [ContentieuxController::class, 'consulter']);
	Route::post('/admin/contentieux/{id}/edit', [ContentieuxController::class, 'modifier']);
	Route::get('/admin/contentieux/{id}/delete', [ContentieuxController::class, 'supprimer']);

	/* opérations de l'administrateur sur les courtiers */

	Route::get('/admin/courtiers', function () {
		return view('administrateurs.courtiers.courtiers');
	});
	Route::get('/admin/courtiers/create', function () {
		return view('administrateurs.courtiers.courtier-create');
	});
	Route::post('/admin/courtiers/create', [CourtierController::class, 'ajouter']);
	Route::get('/admin/courtiers/{id}/edit', [CourtierController::class, 'consulter']);
	Route::post('/admin/courtiers/{id}/edit', [CourtierController::class, 'modifier']);
	Route::get('/admin/courtiers/{id}/delete', [CourtierController::class, 'supprimer']);

	/* opérations de l'administrateur sur les experts */

	Route::get('/admin/experts', function () {
		return view('administrateurs.experts.experts');
	});
	Route::get('/admin/experts/create', function () {
		return view('administrateurs.experts.expert-create');
	});
	Route::post('/admin/experts/create', [ExpertController::class, 'ajouter']);
	Route::get('/admin/experts/{id}/edit', [ExpertController::class, 'consulter']);
	Route::post('/admin/experts/{id}/edit', [ExpertController::class, 'modifier']);
	Route::get('/admin/experts/{id}/delete', [ExpertController::class, 'supprimer']);

	/* opérations de l'administrateur sur les rédacteurs */

	Route::get('/admin/redacteurs', function () {
		return view('administrateurs.redacteurs.redacteurs');
	});
	Route::get('/admin/redacteurs/create', function () {
		return view('administrateurs.redacteurs.redacteur-create');
	});
	Route::post('/admin/redacteurs/create', [RedacteurController::class, 'ajouter']);
	Route::get('/admin/redacteurs/{id}/edit', [RedacteurController::class, 'consulter']);
	Route::post('/admin/redacteurs/{id}/edit', [RedacteurController::class, 'modifier']);
	Route::get('/admin/redacteurs/{id}/delete', [RedacteurController::class, 'supprimer']);

	/* opérations de l'administrateur sur le service clients */

	Route::get('/admin/service-clients', function () {
		return view('administrateurs.service_clients.service-clients');
	});
	Route::get('/admin/service-clients/create', function () {
		return view('administrateurs.service-clients.service-client-create');
	});
	Route::post('/admin/service-clients/create', [ServiceClientController::class, 'ajouter']);
	Route::get('/admin/service-clients/{id}/edit', [ServiceClientController::class, 'consulter']);
	Route::post('/admin/service-clients/{id}/edit', [ServiceClientController::class, 'modifier']);
	Route::get('/admin/service-clients/{id}/delete', [ServiceClientController::class, 'supprimer']);

	/* opérations de l'administrateur sur les clients */

	Route::get('/admin/clients', function () {
		return view('administrateurs.clients.clients');
	});
	Route::get('/admin/clients/create', function () {
		return view('administrateurs.clients.client-create');
	});
	Route::post('/admin/clients/create', [ServiceClientController::class, 'ajouter']);
	Route::get('/admin/clients/{id}/edit', [ServiceClientController::class, 'consulter']);
	Route::post('/admin/clients/{id}/edit', [ServiceClientController::class, 'modifier']);
	Route::get('/admin/clients/{id}/delete', [ServiceClientController::class, 'supprimer']);

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
