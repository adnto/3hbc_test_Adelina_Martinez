<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AirportController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\FlightController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/airports', [AirportController::class, 'index']);
Route::get('/airports/{airport}', [AirportController::class, 'show']);
Route::post('/airports', [AirportController::class, 'store']);
Route::post('/airports/{airport}', [AirportController::class, 'update']);
Route::delete('/airports/{airport}', [AirportController::class, 'destroy']);

Route::get('airlines', [AirlineController::class, 'index']);
Route::get('airlines/{airline}', [AirlineController::class, 'show']);
Route::post('airlines', [AirlineController::class, 'store']);
Route::post('airlines/{airline}', [AirlineController::class, 'update']);
Route::delete('airlines/{airline}', [AirlineController::class, 'destroy']);


Route::get('/flights', [FlightController::class, 'index']);
Route::get('/flights/{id}', [FlightController::class, 'show']);
Route::post('/flights', [FlightController::class, 'store']);
Route::post('/flights/{id}', [FlightController::class, 'update']);
Route::delete('/flights/{id}', [FlightController::class, 'destroy']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
