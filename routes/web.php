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
    return redirect('/login');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/course/create', 'CourseController@create');
Route::post('/course', 'CourseController@store');
Route::get('/course', 'CourseController@index');

Route::get('/student', 'StudentController@index');
Route::get('/student/create', 'StudentController@create');
Route::post('/student', 'StudentController@store');
Route::patch('/student/{id}', 'StudentController@update');
Route::get('/student/{student}', 'StudentController@show');
Route::delete('/student/{student}', 'StudentController@destroy');

Route::get('/staff', 'StaffController@index');
Route::get('/staff/create', 'StaffController@create');
Route::post('/staff', 'StaffController@store');
Route::delete('/staff/{staff}', 'StaffController@destroy');

Route::get('/transaction', 'TransactionController@index');
Route::get('/transaction/create', 'TransactionController@create');
Route::post('/transaction', 'TransactionController@store');
