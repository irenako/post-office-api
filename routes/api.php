<?php

use App\Http\Controllers\PackageController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return new JsonResponse("API is working");
});

Route::controller(PackageController::class)->group(static function() {
    Route::get('packages', 'index');
    Route::post('packages', 'store');
    Route::get('packages/{id}', 'show');
    Route::patch('packages/{id}', 'update');
    Route::delete('packages/{id}', 'destroy');
});