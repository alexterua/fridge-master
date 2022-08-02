<?php

use App\Http\Controllers\API\V1\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/locations', [IndexController::class, 'getAllLocations']);
Route::get('/locations/{location_id}', [IndexController::class, 'getLocationById']);
Route::post('/locations/{location_id}/calculate', [IndexController::class, 'calculate']);
Route::post('/locations/{location_id}/bookings', [IndexController::class, 'createBooking']);
