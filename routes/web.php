<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {

    // return view('dashboard.index');
    return redirect()->route('login');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', DashboardController::class)->name('dashboard.index');

    Route::resource('klipingDigitals', App\Http\Controllers\KlipingDigitalController::class);
    Route::post('/kliping-digital/upload-image', [App\Http\Controllers\KlipingDigitalController::class, 'uploadImage'])->name('kliping-digital.uploadImage');
    Route::resource('bukuDigitals', App\Http\Controllers\BukuDigitalController::class);
    Route::resource('jurnalDigitals', App\Http\Controllers\JurnalDigitalController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);

});
