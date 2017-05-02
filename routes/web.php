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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('tasks', 'DashboardController@tasks')->name('tasks');

    Route::get('dashboard/tasks/number', 'DashboardController@tasksNumber')->name('tasks-number');

    Route::get('create/random/task', 'DashboardController@createRandomTask')->name('createRandomTask');

});
