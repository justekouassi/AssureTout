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
use App\Http\Controllers\TeleoperateurController;
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

	Route::get('/admin', [DashboardController::class, 'admin'])->name('admin');

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

	Route::get('/admin/teleoperateurs', function () {
		return view('administrateurs.teleoperateurs.teleoperateurs');
	});
	Route::get('/admin/teleoperateurs/create', function () {
		return view('administrateurs.teleoperateurs.teleoperateur-create');
	});
	Route::post('/admin/teleoperateurs/create', [TeleoperateurController::class, 'ajouter']);
	Route::get('/admin/teleoperateurs/{id}/edit', [TeleoperateurController::class, 'consulter']);
	Route::post('/admin/teleoperateurs/{id}/edit', [TeleoperateurController::class, 'modifier']);
	Route::get('/admin/teleoperateurs/{id}/delete', [TeleoperateurController::class, 'supprimer']);

	/* opérations de l'administrateur sur les clients */

	Route::get('/admin/clients', function () {
		return view('administrateurs.clients.clients');
	});
	Route::get('/admin/clients/create', function () {
		return view('administrateurs.clients.client-create');
	});
	Route::post('/admin/clients/create', [TeleoperateurController::class, 'ajouter']);
	Route::get('/admin/clients/{id}/edit', [TeleoperateurController::class, 'consulter']);
	Route::post('/admin/clients/{id}/edit', [TeleoperateurController::class, 'modifier']);
	Route::get('/admin/clients/{id}/delete', [TeleoperateurController::class, 'supprimer']);

	/* opérations du service contentieux */

	Route::get('/contentieux', function () {
		return view('service_contentieux.contentieux');
	});
	Route::get('/contentieux/{id}', [ContentieuxController::class, 'consulter']);

	/* opérations des courtiers */

	Route::get('/courtier', [DashboardController::class, 'courtier'])->name('courtier');
	Route::get('/courtier/sinistres', function () {
		return view('sinistres.sinistres');
	});
	Route::get('/courtier/sinistres/create', function () {
		return view('sinistres.sinistre-create');
	});

	/* opérations des rédacteurs */

	Route::get('/redacteur', [DashboardController::class, 'redacteur'])->name('redacteur');
	Route::get('/redacteur/sinistres', function () {
		return view('sinistres.sinistres');
	});
	Route::get('/redacteur/experts', function () {
		return view('redacteurs.experts');
	});
	Route::get('/experts/{id}', [ExpertController::class, 'affecter']);

	/* opérations des téléopérateurs */

	Route::get('/teleoperateurs', function () {
		return view('teleoperateurs.teleoperateur');
	});
	Route::get('/clients', function () {
		return view('teleoperateurs.clients');
	});
	Route::get('/clients/{id}', [ClientController::class, 'consulter']);
	Route::get('/offres', function () {
		return view('teleoperateurs.offres');
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
