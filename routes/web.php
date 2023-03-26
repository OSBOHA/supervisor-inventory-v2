<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SupervisorDutyController;
use App\Http\Controllers\followupTeamController;
use App\Http\Controllers\LeaderController;


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
Route::controller(LeaderController::class)->prefix('leader')->group(function () { 
    Route::get('/listAll','listAll')->name('listAll');
    Route::get('/listBySupervisor','listBy')->name('listBySupervisor');
    Route::get('/listByAdvisor', 'listBy')->name('listByAdvisor');
    Route::get('/listByType','listBy')->name('listByType');

});




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
    Route::get('/display/supervising/team','displaySupervisingTeam')->name('display.supervisingTeam');
    Route::get('/team','supervisingTeam')->name('supervisingTeam');
    Route::post('/teamStore','supervisingTeamStore')->name('supervisingTeam.store');
    Route::get('/duties','supervisorDuty')->name('supervisorDuty');
    Route::post('/dutyStore','supervisorDutyStore')->name('supervisorDuty.store');
    Route::get('/followupTeamduty','followupTeamDuty')->name('followupTeamDuty');
});

######## Followup team  ########
Route::controller(followupTeamController::class)->prefix('followupTeam')->group(function () { 
    Route::get('/create','create')->name('followupTeam.create');
    Route::post('/store','store')->name('followupTeam.store');
});
######## leader  ########
Route::controller(LeaderController::class)->prefix('leader')->group(function () { 
    Route::get('/create/{name_route}/{type_page}','create')->name('leader.create');
    Route::get('/listAll','listAll')->name('listAll');
    Route::get('/listBySupervisor','listBy')->name('listBySupervisor');
    Route::get('/listByAdvisor', 'listBy')->name('listByAdvisor');
    Route::get('/listByType','listBy')->name('listByType');
    Route::get('/manipulatLeader/{name_route}/{type_page}/{leader_id}','manipulatLeader')->name('manipulatLeader');
    Route::post('/manipulatLeaderStore','manipulatLeaderStore')->name('manipulatLeader.store');
    Route::get('/transferLeader/{name_route}/{leader_id}','transferLeader')->name('transferLeader');
    Route::post('/transferLeaderStore','transferLeaderStore')->name('transferLeader.store');
    Route::get('/withoutSupervisor','withoutSupervisor')->name('withoutSupervisor');
    Route::get('/designation','designation')->name('designation');
    Route::get('/designationStore','designationStore')->name('designation.store');
});


