<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GatewayController;
use App\Http\Controllers\UserController;


Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::get('/users/{user}/orders', [UserController::class, 'userOrders']);

Route::prefix('orders')->group(function () {
    Route::get('/', [OrdersController::class, 'store']);
    Route::post('/', [OrdersController::class, 'store']);
    Route::get('/{order}', [OrdersController::class, 'show']);
});


Route::prefix('gateway')->group(function () {
    Route::post('/redirect', [GatewayController::class, 'redirect']);
    Route::any('/callback', [sdd::class, 'verify']);
});


Route::prefix('subscription')->group(function () {
    Route::get('/', [SubscriptionController::class, 'index']);
    Route::get('/usage', [SubscriptionController::class, 'usage']);
});

