<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Route untuk user
Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('dashboard', [Controllers\User\UserController::class, 'index'])->name('user.dashboard');
});

// Route untuk admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/dashboard', [Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
});
