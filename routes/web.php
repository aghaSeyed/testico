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

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});

Route::namespace('Teacher')->prefix('student')->name('student.')->group(function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});

Route::namespace('Student')->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});
Auth::routes();
