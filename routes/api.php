<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



Route::post('me', [UserController::class, 'me']);



// rest api or rpc call
Route::get('/users/{user}/orders', [UserController::class, 'userOrders']);

