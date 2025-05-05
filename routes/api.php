<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;

    Route::get("/users", [UserController::class, 'index']);

    Route::get('/addresses', [AddressController::class,'index']);