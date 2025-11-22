<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Home\BukuDigitalController as HomeBukuDigitalController;
use App\Http\Controllers\Home\KlipingDigitalController as HomeKlipingDigitalController;
use App\Http\Controllers\Home\JurnalDigitalController as HomeJurnalDigitalController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => '/'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // buku
    Route::get('/buku', [HomeBukuDigitalController::class, 'index'])->name('buku.index');
    Route::get('/buku/{id}', [HomeBukuDigitalController::class, 'show'])->name('buku.show');
    // Kliping
    Route::get('/kliping', [HomeKlipingDigitalController::class, 'index'])->name('kliping.index');
    Route::get('/kliping/{id}', [HomeKlipingDigitalController::class, 'show'])->name('kliping.show');

    Route::get('/jurnal', [HomeJurnalDigitalController::class, 'index'])->name('jurnal.index');
    Route::get('/jurnal/{id}', [HomeJurnalDigitalController::class, 'show'])->name('jurnal.show');
});


Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', DashboardController::class)->name('dashboard.index');

    Route::resource('klipingDigitals', App\Http\Controllers\KlipingDigitalController::class);
    Route::post('/kliping-digital/upload-image', [App\Http\Controllers\KlipingDigitalController::class, 'uploadImage'])->name('kliping-digital.uploadImage');
    Route::resource('bukuDigitals', App\Http\Controllers\BukuDigitalController::class);
    Route::resource('jurnalDigitals', App\Http\Controllers\JurnalDigitalController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [App\Http\Controllers\UserProfileController::class, 'index'])->name('profile.index');
        Route::put('/profile/update', [App\Http\Controllers\UserProfileController::class, 'update'])->name('profile.update.custom');

    });
});
