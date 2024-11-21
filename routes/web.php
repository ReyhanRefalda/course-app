<?php

use App\Http\Controllers\Admin\KursusController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArtikelController as AdminArtikelController;
use App\Http\Controllers\Admin\KursusController as AdminKursusController;
use App\Http\Controllers\Admin\KomentarController as AdminKomentarController;
use App\Http\Controllers\Admin\ModulController as AdminModulController; // Admin Modul Controller
use App\Http\Controllers\Admin\PelajaranController as AdminPelajaranController; // Admin Pelajaran Controller
use App\Http\Controllers\User\ArtikelController as UserArtikelController;
use App\Http\Controllers\User\KomentarController as UserKomentarController;
use App\Http\Controllers\User\ModulController as UserModulController; // User Modul Controller
use App\Http\Controllers\User\PelajaranController as UserPelajaranController; // User Pelajaran Controller
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;


// Halaman utama
Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::middleware('can:manage kursus')->group(function () {
            Route::resource('kursus', KursusController::class);
        });

        Route::middleware('can:manage modul')->group(function () {
            Route::resource('modul', AdminModulController::class);
        });

        Route::middleware('can:manage pelajaran')->group(function () {
            Route::resource('pelajaran', AdminPelajaranController::class);
        });

        Route::middleware('can:manage artikel')->group(function () {
            Route::resource('artikel', AdminArtikelController::class);
        });

        Route::middleware('can:manage user')->group(function () {
            Route::get('user', [AdminController::class, 'listUsers'])->name('user.index');
            Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('users.edit');
            Route::patch('/users/{id}/updateUser', [AdminController::class, 'updateUser'])->name('users.updateUser');
            Route::delete('/users/{id}/destroyUser', [AdminController::class, 'destroyUser'])->name('users.destroyUser');
        });
    });
});

require __DIR__ . '/auth.php';
