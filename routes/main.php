<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TournamentController;

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // routes/web.php o api.php (según tu arquitectura)
    Route::get('/tournaments/{id}', [TournamentController::class, 'show'])->name('api.tournaments.show');

    
