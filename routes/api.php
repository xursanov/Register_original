<?php

use App\Http\Controllers\CityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('city', [CityController::class, 'store']);

Route::get('city', [CityController::class, 'index']);

Route::get('city/{id}', [CityController::class, 'show']);

Route::put('city/{id}', [CityController::class, 'update']);

Route::delete('city/{id}', [CityController::class, 'destroy']);

Route::put('city/change/{id}', [CityController::class, 'changeActive']);




