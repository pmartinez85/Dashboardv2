
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

    Route::get('dashboard', function ()    {
        $data = [];
        return view('dashboard',$data);
    })->name('dashboard');

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('tasks', 'DashboardController@tasks')->name('tasks');
    Route::get('dashboard/tasks/number', 'DashboardController@tasksNumber');
    Route::get('dashboard/threads/number', 'DashboardController@threadsNumber');
    Route::get('create/random/task', 'DashboardController@createRandomTask');
    Route::get('create/random/thread', 'DashboardController@createRandomThread');
    Route::get('activity-feed', 'DashboardController@fetchActivityFeed');

});

Route::get('dashboard/graphs/1', 'DashboardController@graph1');
