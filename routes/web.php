<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





############# LEADER DUTY ############# 
Route::group(['prefix' => 'duty'], function () {
    Route::get('/followup-team', function () {
        return view('duties.followup-team');
    });
    Route::get('/supervising-team', function () {
        return view('duties.supervising-team');
    });
    Route::get('/display-supervising-team', function () {
        return view('duties.display-supervising-team');
    });
    Route::get('/super-duties', function () {
        return view('duties.super-duties');
    });
    });
############# END LEADER DUTY ############# 

############# END LEADERS ############# 
Route::group(['prefix' => 'leaders'], function () {
    Route::get('/list-all', function () {
        return view('leader.lis-all');
    });
    Route::get('/list-one', function () {
        return view('leader.list-one');
    });
    Route::get('/list-by', function () {
        return view('leader.list-all-by');
    });
    Route::get('/add', function () {
        return view('leader.add');
    });
});
############# END LEADERS ############# 


Route::get('/supervisors/list-all', function () {
    return view('supervisor.lis-all');
});
Route::get('/supervisors/list-one', function () {
    return view('supervisor.list-one');
});
