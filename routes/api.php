<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'rest'], function () {
    Route::get('opportunitys/index', [App\Http\Controllers\OpportunitysController::class, 'indexApi'])->name('opportunitys');
    Route::post('opportunitys/update/{opportunitys}/{api?}', [App\Http\Controllers\OpportunitysController::class, 'updateStatus']);
});
