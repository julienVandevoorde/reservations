<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->group(function () {
    Route::get('/shows', [ShowController::class, 'index']);
    Route::get('/shows/search', [ShowController::class, 'search']);
    Route::get('/shows/{id}', [ShowController::class, 'show']);
    Route::post('/shows', [ShowController::class, 'store']);
    Route::put('/shows/{id}', [ShowController::class, 'update']);
    Route::delete('/shows/{id}', [ShowController::class, 'destroy']);
});
