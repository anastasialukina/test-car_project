<?php

use App\Http\Resources\RentCarResource;
use App\Models\User;
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
Route::post('/rent_car',
    [App\Http\Controllers\Api\ApiRentCarController::class,
        'rentCar'])
    ->name('api.rentCar');
Route::post('/release_car',
    [App\Http\Controllers\Api\ApiRentCarController::class,
        'releaseCar'])
    ->name('api.releaseCar');

Route::get('/rents',
    [App\Http\Controllers\Api\ApiRentCarController::class,
        'rents'])
    ->name('api.rents');
