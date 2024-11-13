<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\AdminMiddleware;

// Route utama untuk halaman depan
Route::get('/', function () {
    return view('home');
});

// Route untuk autentikasi dan pengaturan profil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
});

// Route utama untuk dashboard yang mengarahkan sesuai role
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        // Cek peran pengguna dan arahkan ke controller yang sesuai
        if (Auth::user()->usertype === 'admin') {
            return app(AdminController::class)->index();
        } else {
            return app(UserController::class)->index();
        }
    })->name('dashboard');
});


Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [AdminController::class, 'listUsers'])->name('users.index');
    Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::patch('/users/{id}/updateUser', [AdminController::class, 'updateUser'])->name('users.updateUser');
    // Route untuk menghapus pengguna
    Route::delete('users/{id}/destroyUser', [AdminController::class, 'destroyUser'])->name('users.destroyUser');
});



// Pastikan untuk memanggil file auth.php
require __DIR__ . '/auth.php';
