<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/course/create', 'CourseController@create');
Route::post('/course', 'CourseController@store');
Route::get('/course', 'CourseController@index');

Route::get('/student', 'StudentController@index');
Route::get('/student/create', 'StudentController@create');
Route::post('/student', 'StudentController@store');

