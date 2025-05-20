<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TournamentController;

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // routes/web.php o api.php (según tu arquitectura)
    Route::get('/tournaments/{id}', [TournamentController::class, 'show'])->name('api.tournaments.show');

    Route::get('dashboard', [App\Http\Controllers\MetricController::class, 'index'])->name('dashboard');

    Route::get('users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users');
    Route::post('users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::post('users/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::post('users/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');