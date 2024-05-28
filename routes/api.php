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
    Route::get('/show', [ShowController::class, 'index']);
    Route::get('/show/search', [ShowController::class, 'search']);
    Route::get('/show/{id}', [ShowController::class, 'show']);
    Route::post('/show', [ShowController::class, 'store']);
    Route::put('/show/{id}', [ShowController::class, 'update']);
    Route::delete('/show/{id}', [ShowController::class, 'destroy']);
});
