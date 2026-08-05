<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventApiController;
use App\Http\Controllers\Api\ReservationApiController;
use App\Http\Controllers\Api\AuthApiController;


Route::get('/events', [EventApiController::class, 'index']);
Route::get('/events/{event}', [EventApiController::class, 'show']);

