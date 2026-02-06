<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PersonnelController;

Route::apiResource('personnels', PersonnelController::class);
Route::apiResource('produits', ProductController::class);
