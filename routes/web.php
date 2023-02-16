<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SupervisorDutyController;
use App\Http\Controllers\followupTeamController;

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

######## Supervising task and duties ########
Route::controller(SupervisorDutyController::class)->prefix('supervising')->group(function () { 
    Route::get('/team','supervisingTeam')->name('supervisingTeam');
    Route::post('/teamStore','supervisingTeamStore')->name('supervisingTeam.store');
    Route::get('/duties','supervisorDuty')->name('supervisorDuty');
    Route::post('/dutyStore','supervisorDutyStore')->name('supervisorDuty.store');
});

######## Followup team  ########
Route::controller(followupTeamController::class)->prefix('followupTeam')->group(function () { 
    Route::get('/create','create')->name('followupTeam.create');
    Route::post('/store','store')->name('followupTeam.store');
});


