<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/appointments/avaliableTimes/{date}', [AppointmentController::class, 'listAvaliableTimes'])->name('appointment.avaliableTimes');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointment.index');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointment.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::get('/appointments/{appointment}/confirm', [AppointmentController::class, 'confirm'])->name('appointment.confirm');
    Route::get('/appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointment.edit');
    Route::put('/appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointment.update');
});

require __DIR__.'/auth.php';
