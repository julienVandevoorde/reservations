<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\LocalityController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\RepresentationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home route
Route::get('/', [HomeController::class, 'index'])->name('welcome');

// Authentification
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Artist routes
Route::get('/artist', [ArtistController::class, 'index'])->name('artist.index');
Route::get('/artist/{id}', [ArtistController::class, 'show'])->where('id', '[0-9]+')->name('artist.show');
Route::get('/artist/edit/{id}', [ArtistController::class, 'edit'])->where('id', '[0-9]+')->name('artist.edit');
Route::put('/artist/{id}', [ArtistController::class, 'update'])->where('id', '[0-9]+')->name('artist.update');
Route::get('/artist/create', [ArtistController::class, 'create'])->name('artist.create');
Route::post('/artist', [ArtistController::class, 'store'])->name('artist.store');
Route::delete('/artist/{id}', [ArtistController::class, 'destroy'])->where('id', '[0-9]+')->name('artist.delete');

// Type routes
Route::get('/type', [TypeController::class, 'index'])->name('type.index');
Route::get('/type/{id}', [TypeController::class, 'show'])->where('id', '[0-9]+')->name('type.show');
Route::get('/type/edit/{id}', [TypeController::class, 'edit'])->where('id', '[0-9]+')->name('type.edit');
Route::put('/type/{id}', [TypeController::class, 'update'])->where('id', '[0-9]+')->name('type.update');

// Locality routes
Route::get('/locality', [LocalityController::class, 'index'])->name('locality.index');
Route::get('/locality/{id}', [LocalityController::class, 'show'])->where('id', '[0-9]+')->name('locality.show');

// Role routes
Route::get('/role', [RoleController::class, 'index'])->name('role.index');
Route::get('/role/{id}', [RoleController::class, 'show'])->where('id', '[0-9]+')->name('role.show');
Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->where('id', '[0-9]+')->name('role.edit');
Route::put('/role/{id}', [RoleController::class, 'update'])->where('id', '[0-9]+')->name('role.update');

// Location routes
Route::get('location', [LocationController::class, 'index'])->name('location.index');
Route::get('location/{id}', [LocationController::class, 'show'])->where('id', '[0-9]+')->name('location.show');
Route::get('/location/edit/{id}', [LocationController::class, 'edit'])->where('id', '[0-9]+')->name('location.edit');
Route::put('/location/{id}', [LocationController::class, 'update'])->where('id', '[0-9]+')->name('location.update');

// Show routes
Route::get('/show', [ShowController::class, 'index'])->name('show.index');
Route::get('/show/{id}', [ShowController::class, 'show'])->where('id', '[0-9]+')->name('show.show');
Route::get('/recherche', [ShowController::class, 'search'])->name('search.show');
Route::get('/show/edit/{id}', [ShowController::class, 'edit'])->where('id', '[0-9]+')->name('show.edit');
Route::put('/show/{id}', [ShowController::class, 'update'])->where('id', '[0-9]+')->name('show.update');
Route::post('/show', [ShowController::class, 'store'])->name('show.store');
Route::get('/show/create', [ShowController::class, 'create'])->name('show.create');
Route::delete('/show/{id}', [ShowController::class, 'destroy'])->where('id', '[0-9]+')->name('show.destroy');

// Representation routes
Route::get('/representation', [RepresentationController::class, 'index'])->name('representation.index');
Route::get('/representation/{id}', [RepresentationController::class, 'show'])->where('id', '[0-9]+')->name('representation.show');
Route::post('/representation/reservation/{id}', [RepresentationController::class, 'reservation'])->where('id', '[0-9]+')->name('representation.reservation');
Route::post('/handle-payment', [RepresentationController::class, 'handlePayment'])->name('handle.payment');
Route::get('/payment-success', [RepresentationController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/representation/{id}/book', [RepresentationController::class, 'book'])->where('id', '[0-9]+')->name('representation.book');

//Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// Profil de l'utilisateur
Route::group(['middleware' => 'auth'], function() {
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile.show');
    Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
});

// Modifier un utilisateur
Route::get('/dashboard/users/{user}/edit', [DashboardController::class, 'edit'])->name('users.edit');
// Mettre à jour un utilisateur
Route::put('/dashboard/users/{user}', [DashboardController::class, 'update'])->name('users.update');
// Supprimer un utilisateur
Route::delete('/dashboard/users/{user}', [DashboardController::class, 'destroy'])->name('users.destroy');


// Ajoute cette ligne dans web.php
Route::get('/dashboard/export-users', [DashboardController::class, 'exportUsersCsv'])->name('dashboard.export');
