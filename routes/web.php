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
    return view('dashboard.index');
    // return redirect()->route('login');
});
Route::get('/1', function () {
    return view('create');
});



Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', DashboardController::class)->name('dashboard.index');
});
