<?php
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','is_admin'])->group(function () {
    // Rutas protegidas
    Route::get('dashboard', [App\Http\Controllers\MetricController::class, 'index'])->name('dashboard');
    Route::get('users/create', [App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::get('users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('users/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::get('users/add/create', [App\Http\Controllers\UserController::class, 'adduser'])->name('users.add.create');
    Route::post('users/add/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::delete('users/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
});