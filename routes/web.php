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
    return view('welcome');
});


Route::namespace('Admin')->group(function () {
//admin kol ke yeki az teacher hast akhare kar kamel mishe
});


Route::namespace('Teacher')->group(function () {

});

Auth::routes();

Route::namespace('Students')->group(function () {

});
