<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/passwords')->name('dashboard');

//PasswordsManager
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('passwords',  PasswordController::class);
});

//Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
