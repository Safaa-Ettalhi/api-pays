<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::get('/users', [AuthController::class, 'index']);
    

Route::apiResource('countries', CountryController::class);

    Route::post('/countries/{country}/flag', [CountryController::class, 'uploadFlag']);
    Route::get('/countries/{country}/flag', [CountryController::class, 'getFlag']);
});
Route::middleware('auth:sanctum')->put('/countries/{country}', [CountryController::class, 'update']);

// Route POST alternative pour Swagger
Route::middleware('auth:sanctum')->post('/countries/{country}/update', [CountryController::class, 'update']);