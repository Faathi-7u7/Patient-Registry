<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IslandController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PatientController;

Route::apiResource('islands', IslandController::class); // For islands
Route::apiResource('addresses', AddressController::class); // For addresses
Route::apiResource('patients', PatientController::class); // For patients
