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
    return view('auth.login');
});

Auth::routes();
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::group(['middleware' => 'auth:user'], function () {

    Route::resource('role','RoleController');

    Route::resource('user','UserController');
    Route::put('user/change-password/{id}','UserController@updatePassword');
    Route::resource('expense-category', 'ExpenseCategoryController');

    Route::resource('expense', 'ExpenseController');

    Route::resource('dashboard', 'DashboardController');
});
