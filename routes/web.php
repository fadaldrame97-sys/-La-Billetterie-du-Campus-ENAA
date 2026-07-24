<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/login',[AuthController::class,'showLogin'])->name('login');

Route::post('/login',[AuthController::class,'login'])->name('login.store');
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth')->name('logout');

Route::get('/events', [EventController::class, 'liste'])->middleware('auth')->name('events.index');
Route::post('/reservations/{event}', [ReservationController::class, 'store']) ->middleware('auth')->name('reservations.store');

Route::get('/mes-Pass',[ReservationController::class,'index'])->middleware('auth')->name('reservations.index');


Route::middleware(['auth', 'isAdmin'])->group(function () {

   

    Route::get('/admin/dashboard', [EventController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/events/create', [EventController::class, 'create'])->name('events.create');

    Route::post('/admin/events', [EventController::class, 'store'])->name('events.store');

    Route::get('/admin/event/{event}/edit',[EventController::class,'edit'])->name('events.edit');

    Route::put('/admin/events/{event}', [EventController::class, 'update'])->name('events.update');
    
    
});