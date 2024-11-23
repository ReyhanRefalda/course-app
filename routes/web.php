<?php

use App\Http\Controllers\Admin\KursusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArtikelController as AdminArtikelController;
use App\Http\Controllers\Admin\KursusController as AdminKursusController;
use App\Http\Controllers\Admin\KomentarController as AdminKomentarController;
use App\Http\Controllers\Admin\ModulController as AdminModulController;
use App\Http\Controllers\Admin\PelajaranController as AdminPelajaranController;
use App\Http\Controllers\User\ArtikelController as UserArtikelController;
use App\Http\Controllers\User\KomentarController as UserKomentarController;
use App\Http\Controllers\User\ModulController as UserModulController;
use App\Http\Controllers\User\PelajaranController as UserPelajaranController;

// Halaman utama (Landing Page)
Route::get('/', function () {
    return view('home');
});

// Dashboard Utama (Admin)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

// Profil: Digunakan untuk User dan Admin
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Kelompok Route Khusus Admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

    // Manajemen Kursus
    Route::middleware('can:manage kursus')->group(function () {
        Route::resource('kursus', AdminKursusController::class);
    });

    // Manajemen Modul
    Route::middleware('can:manage modul')->group(function () {
        Route::resource('modul', AdminModulController::class);
    });

    // Manajemen Pelajaran
    Route::middleware('can:manage pelajaran')->group(function () {
        Route::resource('pelajaran', AdminPelajaranController::class);
    });

    // Manajemen Artikel
    Route::middleware('can:manage artikel')->group(function () {
        Route::resource('artikel', AdminArtikelController::class);
    });

    // Manajemen Pengguna
    Route::middleware('can:manage user')->group(function () {
        Route::get('/users', [AdminController::class, 'listUsers'])->name('users.index');
        Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('users.edit');
        Route::patch('/users/{id}/updateUser', [AdminController::class, 'updateUser'])->name('users.updateUser');
        Route::delete('/users/{id}/destroyUser', [AdminController::class, 'destroyUser'])->name('users.destroyUser');
    });
});

// Kelompok Route Khusus User
Route::prefix('user')->name('user.')->middleware(['auth', 'user'])->group(function () {

    // Artikel (User)
    Route::get('/artikel', [UserArtikelController::class, 'index'])->name('artikel.index');
    Route::get('/artikel/{id}', [UserArtikelController::class, 'show'])->name('artikel.show');

    // Komentar (User)

});

// Tambahkan route otentikasi (login, register, logout)
require __DIR__ . '/auth.php';
