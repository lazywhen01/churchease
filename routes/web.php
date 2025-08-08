<?php

use App\Http\Controllers\Web\Core\Church\Dashboard\ChurchDashboard;
use App\Http\Middleware\Core\UserRole\EnsureUserRoleIsChurchAdmin;
use App\Http\Middleware\Core\UserRole\EnsureUserRoleIsSuperAdmin;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
	return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {


	// Super Admin Role
	Route::middleware(EnsureUserRoleIsSuperAdmin::class)->group(function () {
		Route::get('dashboard', function () {
			return Inertia::render('dashboard');
		})->name('dashboard');
	});

	// Church Admin Role
	Route::middleware(EnsureUserRoleIsChurchAdmin::class)->group(function () {
		Route::prefix('church')->name('church.')->group(function () {

			Route::get('dashboard', ChurchDashboard::class)->name('dashboard');
		});
	});
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
