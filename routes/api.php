<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;

    Route::get("/users", [UserController::class, 'index']);

    Route::get('/users/{id}', [UserController::class, 'findOne']);

    Route::post('/user', [UserController::class,'postUser']);

    Route::get('/addresses', [AddressController::class,'index']);

    Route::get('/addresses/{id}', [AddressController::class,'findOne']);

    Route::post('/address', [AddressController::class,'postAddress']);