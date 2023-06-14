<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AirportController;
use App\Http\Controllers\Api\FlightController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('airports', AirportController::class);
Route::apiResource('flights', FlightController::class);