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
});


Route::namespace('Teachers')->prefix('teacher')->group(function () {
    Route::get('login', 'LoginController@showLoginForm')->name('teacher.login');
    Route::post('login', 'LoginController@login')->name('teacher.login');
    Route::get('logout', 'LoginController@logout')->name('teacher.logout');
    Route::get('register', 'LoginController@register')->name('teacher.register');

    Route::group(['middleware'=>'TeacherAuth'], function (){
        Route::get('dashboard', 'DashboardController@index')->name('teacher.dashboard');
        Route::get('class/store' , 'ClassController@store')->name('teacher.class.store');
        Route::resource('class' , 'ClassController');
        Route::resource('exam' , 'ExamController');
        Route::resource('question' , 'QuestionController');
    });
});

Route::namespace('Students')->group(function () {

});
Auth::routes();
