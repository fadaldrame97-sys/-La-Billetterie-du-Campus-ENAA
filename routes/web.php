<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/admin/dashboard', [EventController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/admin/events/create', [EventController::class, 'create'])
        ->name('events.create');

    Route::post('/admin/events', [EventController::class, 'store'])
        ->name('events.store');

});