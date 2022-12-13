<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaderDutyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
    return view('welcome');
});

*/



############# LEADER DUTY #############
Route::group(['prefix' => 'leaderduty'], function () {
    Route::get('/',[LeaderDutyController::class, 'index']);
    Route::get('/create',[LeaderDutyController::class, 'create'])->name('leaderDuty.create');
    //Route::get('/', 'LeaderDutyController@index')->name('index');
    //Route::get('/create', 'LeaderDutyController@create')->name('leaderDuty.create');
    Route::post('/duty-store', 'LeaderDutyController@store')->name('store');
    Route::get('/show', 'LeaderDutyController@show')->name('leaderDuty.show');
    Route::get('/createNotes', 'LeaderDutyController@createNotes')->name ('createNotes');
    Route::get('/objections.my_objections', 'LeaderDutyController@objections.my_objections')->name ('objections.my_objections');
    Route::get('/list_all_messages', 'LeaderDutyController@list_all_messages')->name ('list_all_messages');
    Route::post('/update', 'LeaderDutyController@update');
    Route::post('/delete', 'LeaderDutyController@delete');
});
############# END LEADER DUTY #############

