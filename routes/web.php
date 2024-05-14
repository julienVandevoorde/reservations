<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\LocalityController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\RepresentationController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
//…
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Artist
Route::get('/artist', [ArtistController::class, 'index'])->name('artist.index');
Route::get('/artist/{id}', [ArtistController::class, 'show'])
		->where('id', '[0-9]+')->name('artist.show');
Route::get('/artist/edit/{id}', [ArtistController::class, 'edit'])
		->where('id', '[0-9]+')->name('artist.edit');
Route::put('/artist/{id}', [ArtistController::class, 'update'])
		->where('id', '[0-9]+')->name('artist.update');
Route::get('/artist/create', [ArtistController::class, 'create'])->name('artist.create');
Route::post('/artist', [ArtistController::class, 'store'])->name('artist.store');
Route::delete('/artist/{id}', [ArtistController::class, 'destroy'])
	->where('id', '[0-9]+')->name('artist.delete');

//Type
Route::get('/type', [TypeController::class, 'index'])->name('type.index');
Route::get('/type/{id}', [TypeController::class, 'show'])
			->where('id', '[0-9]+')->name('type.show');
Route::get('/type/edit/{id}', [TypeController::class, 'edit'])
			->where('id', '[0-9]+')->name('type.edit');
Route::put('/type/{id}', [TypeController::class, 'update'])
			->where('id', '[0-9]+')->name('type.update');

//Locality
Route::get('/locality', [LocalityController::class, 'index']) ->name('locality.index');
Route::get('/locality/{id}', [LocalityController::class, 'show'])
					->where('id', '[0-9]+')->name('locality.show');

//Role
Route::get('/role', [RoleController::class, 'index'])->name('role.index');
Route::get('/role/{id}', [RoleController::class, 'show'])
					->where('id', '[0-9]+')->name('role.show');
Route::get('/role/edit/{id}', [RoleController::class, 'edit'])
					->where('id', '[0-9]+')->name('role.edit');
Route::put('/role/{id}', [RoleController::class, 'update'])
					->where('id', '[0-9]+')->name('role.update');
					
//Location
Route::get('location', [LocationController::class, 'index'])->name('location.index');
Route::get('location/{id}', [LocationController::class, 'show'])
					->where('id', '[0-9]+')->name('location.show');
Route::get('/location/edit/{id}', [LocationController::class, 'edit'])
					->where('id', '[0-9]+')->name('location.edit');
Route::put('/location/{id}', [LocationController::class, 'update'])
					->where('id', '[0-9]+')->name('location.update');

//Show
Route::get('/show', [ShowController::class, 'index'])->name('show.index');
Route::get('/show/{id}', [ShowController::class, 'show'])
					->where('id', '[0-9]+')->name('show.show');

Route::get('/recherche', [ShowController::class, 'search'])->name('search.show');

//Representation	
Route::get('/representation', [RepresentationController::class, 'index'])
					->name('representation.index');
Route::get('/representation/{id}', [RepresentationController::class, 'show'])
					->where('id', '[0-9]+')->name('representation.show');
Route::get('/representation/{id}/book', [RepresentationController::class, 'book'])
					->where('id', '[0-9]+')->name('representation.book');

//Reservation
Route::post('/reservation', [ReservationController::class, 'store'])
					->where('id', '[0-9]+')->name('reservation.store');

Route::post('/reservation/pay', [ReservationController::class, 'pay'])
					->where('id', '[0-9]+')->name('reservation.pay');
					