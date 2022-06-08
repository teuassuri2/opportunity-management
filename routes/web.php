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
    return redirect('auth');
});


Route::get('auth', [App\Http\Controllers\UsersController::class, 'auth'])->name('auth');
Route::post('auth/login', [App\Http\Controllers\UsersController::class, 'authLogin'])->name('auth_login');


Route::get('customers/store', 'CustomersController@store');
Route::post('customers/store', 'CustomersController@store');
Route::get('customers/edit/{id}', 'CustomersController@edit');
Route::post('customers/edit', 'CustomersController@edit');
Route::get('customers/remover/{id}', 'CustomersController@remover');

Route::get('opportunitys/index', 'OpportunitysController@index');
Route::get('opportunitys/store', 'OpportunitysController@store');
Route::post('opportunitys/store', 'OpportunitysController@store');
Route::get('opportunitys/edit/{id}', 'OpportunitysController@edit');
Route::post('opportunitys/edit', 'OpportunitysController@edit');
Route::get('opportunitys/remover/{id}', 'OpportunitysController@remover');


Route::get('opportunitys_status/index', 'OpportunitysStatusController@index');
Route::get('opportunitys_status/store', 'OpportunitysStatusController@store');
Route::post('opportunitys_status/store', 'OpportunitysStatusController@store');
Route::get('opportunitys_status/edit/{id}', 'OpportunitysStatusController@edit');
Route::post('opportunitys_status/edit', 'OpportunitysStatusController@edit');
Route::get('opportunitys_status/remover/{id}', 'OpportunitysStatusController@remover');


Route::get('products/index', 'ProductsController@index');
Route::get('products/store', 'ProductsController@store');
Route::post('products/store', 'ProductsController@store');
Route::get('products/edit/{id}', 'ProductsController@edit');
Route::post('products/edit', 'ProductsController@edit');
Route::get('products/remover/{id}', 'ProductsController@remover');


Route::get('types_users/index', 'TypesUsersController@index');
Route::get('types_users/store', 'TypesUsersController@store');
Route::post('types_users/store', 'TypesUsersController@store');
Route::get('types_users/edit/{id}', 'TypesUsersController@edit');
Route::post('types_users/edit', 'TypesUsersController@edit');
Route::get('types_users/remover/{id}', 'TypesUsersController@remover');


Route::get('users/index', 'UsersController@index');
Route::get('users/store', 'UsersController@store');
Route::post('users/store', 'UsersController@store');
Route::get('users/edit/{id}', 'UsersController@edit');
Route::post('users/edit', 'UsersController@edit');
Route::get('users/remover/{id}', 'UsersController@remover');
