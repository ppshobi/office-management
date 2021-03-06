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
    return redirect('/dashboard');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/course/create', 'CourseController@create');
    Route::post('/course', 'CourseController@store');
    Route::get('/course', 'CourseController@index');
    Route::delete('/course/{course}', 'CourseController@destroy');
    Route::get('/course/{course}/edit', 'CourseController@edit');
    Route::patch('/course/{course}', 'CourseController@update');

    Route::get('/student', 'StudentController@index');
    Route::get('/student/create', 'StudentController@create');
    Route::post('/student', 'StudentController@store');
    Route::patch('/student/{student}', 'StudentController@update');
    Route::get('/student/{student}', 'StudentController@show');
    Route::get('/student/{student}/edit', 'StudentController@edit');
    Route::delete('/student/{student}', 'StudentController@destroy');

    Route::get('/staff', 'StaffController@index');
    Route::get('/staff/create', 'StaffController@create');
    Route::post('/staff', 'StaffController@store');
    Route::get('/staff/{staff}', 'StaffController@show');
    Route::get('/staff/{staff}/edit', 'StaffController@edit');
    Route::patch('/staff/{staff}', 'StaffController@update');
    Route::delete('/staff/{staff}', 'StaffController@destroy');

    Route::get('/transaction', 'TransactionController@index');
    Route::get('/transaction/create', 'TransactionController@create');
    Route::post('/transaction', 'TransactionController@store');
    Route::patch('/transaction/{transaction}', 'TransactionController@update');
    Route::delete('/transaction/{transaction}', 'TransactionController@destroy');
    Route::get('/transaction/{transaction}/edit', 'TransactionController@edit');

    Route::get('/backup', function(){
        Artisan::call('backup:run', ['--only-db' => true, '--disable-notifications'=> true]);

        session()->flash('success', 'Backup Successfull');

        return redirect('/dashboard');
    });

    Route::get('/report/transaction', 'ReportController@transaction');
    Route::post('/report/transaction', 'ReportController@generateTransactionReport');
    Route::get('/report/students/unpaid', 'ReportController@getUnpaidStudents');

});



Route::resource('test', 'Controller');

