<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArtikelController as AdminArtikelController;  // ArtikelController for admin
use App\Http\Controllers\Admin\KursusController as AdminKursusController;  // ArtikelController for admin
use App\Http\Controllers\User\ArtikelController as UserArtikelController;  // ArtikelController for user
use App\Http\Controllers\Admin\KomentarController as AdminKomentarController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\User\KomentarController as UserKomentarController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;

// Route utama untuk halaman depan
Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/details', [FrontController::class, 'details'])->name('front.details');

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

// Route admin
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [AdminController::class, 'listUsers'])->name('users.index');
    Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::patch('/users/{id}/updateUser', [AdminController::class, 'updateUser'])->name('users.updateUser');
    Route::delete('/users/{id}/destroyUser', [AdminController::class, 'destroyUser'])->name('users.destroyUser');
    Route::resource('artikel', AdminArtikelController::class);
    Route::resource('kursus', AdminKursusController::class);
});

// Route User
Route::middleware(['auth', UserMiddleware::class])->prefix('user')->name('user.')->group(function () {
    Route::get('/artikel', [UserArtikelController::class, 'index'])->name('artikel.index'); // Daftar artikel
    Route::get('/artikel/{id}', [UserArtikelController::class, 'show'])->name('artikel.show'); // Detail artikel
});

require __DIR__ . '/auth.php';
