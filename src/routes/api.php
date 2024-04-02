<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::apiResource('users', UserController::class)->only(['store']);
Route::apiResource('users', UserController::class)->except(['store'])->middleware('auth:sanctum');

Route::apiResource('events', EventController::class)->middleware('auth:sanctum');