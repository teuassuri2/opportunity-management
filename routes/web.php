<?php

use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    return redirect()->route('auth');
});

Route::get('auth', [App\Http\Controllers\UsersController::class, 'auth'])->name('auth');
Route::post('auth/login', [App\Http\Controllers\UsersController::class, 'authLogin'])->name('auth_login');
Route::get('auth/logout', [App\Http\Controllers\UsersController::class, 'authLogout'])->name('logout');

Route::group(['middleware' => 'adminAuth'], function ($router) {
    Route::get('opportunitys/index', [App\Http\Controllers\OpportunitysController::class, 'index'])->name('opportunitys');
    Route::get('opportunitys/store', [App\Http\Controllers\OpportunitysController::class, 'store'])->name('opportunitys_store');
    Route::post('opportunitys/create', [App\Http\Controllers\OpportunitysController::class, 'storeCreate'])->name('opportunitys_store_create');
    Route::get('opportunitys/action/{opportunitys}/{option}', [App\Http\Controllers\OpportunitysController::class, 'acceptOrReject']);
    Route::get('opportunitys/update/{opportunitys}', [App\Http\Controllers\OpportunitysController::class, 'update'])->name('opportunitys_update');
    Route::post('opportunitys/update/{opportunitys}', [App\Http\Controllers\OpportunitysController::class, 'updateStatus']);
});

Route::fallback(function () {
    return redirect()->route('auth');
});