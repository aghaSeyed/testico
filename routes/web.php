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

//Route::namespace('Admin')->prefix('student')->name('student.')->group(function () {
//});


Route::namespace('Teachers')->prefix('teacher')->group(function () {
    Route::get('login', 'LoginController@showLoginForm')->name('teacher.login');
    Route::post('login', 'LoginController@login')->name('teacher.login');
    Route::get('logout', 'LoginController@logout')->name('teacher.logout');
    Route::get('register', 'LoginController@register')->name('teacher.register');

    Route::group(['middleware'=>'TeacherAuth'], function (){
        Route::get('dashboard', 'DashboardController@index')->name('teacher.dashboard');
        Route::resource('class' , 'ClassController');
        Route::post('class/store' , 'ClassController@store')->name('teacher.class.store');
        Route::get('class/add/{class}/{student}' , 'ClassController@addToRoom')->name('teacher.class.add');
        Route::get('class/add/test' , 'ClassController@test');
        Route::get('class/remove/{class}/{student}' , 'ClassController@removeFromRoom')->name('teacher.class.destroy');
        Route::resource('exam' , 'ExamController');
        Route::get('exam/result/{exam}' , 'ExamController@result')->name('exam.result');
        Route::resource('question' , 'QuestionController');
    });
});

Route::namespace('Student')->group(function () {
    Route::group(['middleware'=>'auth' , 'prefix' => 'student'], function () {
        Route::get('dashboard', 'DashboardController@index')->name('student.dashboard');
        Route::resource('studentClass' , 'ClassController');
        Route::get('studentClass/join/{studentClass}' , 'ClassController@join')->name('studentClass.join');
        Route::get('exam/show/{exam}/{room}' , 'ExamController@show')->name('student.exam.show');
        Route::post('exam/result/{exam}' , 'ExamController@execute')->name('student.exam.execute');

    });
});

Auth::routes();
