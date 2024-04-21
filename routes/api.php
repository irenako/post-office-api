<?php

use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserController;
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

Route::controller(UserController::class)->group(static function() {
    Route::get('users', 'index');
    Route::post('users', 'store');
    Route::get('users/{id}', 'show');
    Route::get('users/{phone}/packages', 'getAllPackages');
    Route::patch('users/{phone}', 'update');
    Route::delete('users/{phone}', 'destroy');
});

Route::controller(DeliveryController::class)->group(static function() {
    Route::get('deliveries', 'index');
    Route::post('deliveries', 'store');
    Route::get('deliveries/{id}', 'show');
    Route::patch('deliveries/{id}', 'update');
    Route::delete('deliveries/{id}', 'destroy');
});