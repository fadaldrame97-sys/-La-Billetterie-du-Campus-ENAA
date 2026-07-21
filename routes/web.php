<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/login',[AuthController::class,'ShowLogin'])->name('login');

Route::put('/login',[AuthController::class,'login'])->name('login.store');
Route::put('/logout',[AuthController::class,'login'])->middleware('auth')->name('logout');


Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/admin/dashboard', [EventController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/admin/events/create', [EventController::class, 'create'])
        ->name('events.create');

    Route::post('/admin/events', [EventController::class, 'store'])
        ->name('events.store');

});