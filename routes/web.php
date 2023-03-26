<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SupervisorDutyController;
use App\Http\Controllers\SupervisorTasksController;
use App\Http\Controllers\followupTeamController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\WeekController;
use App\Http\Controllers\PostController;





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

######## Supervising duties ########
Route::controller(SupervisorDutyController::class)->prefix('supervising')->group(function () { 
    Route::get('/team','supervisingTeam')->name('supervisingTeam');
    Route::post('/teamStore','supervisingTeamStore')->name('supervisingTeam.store');
    Route::post('/show', 'show')->name('supervisingTeam.show');

});

######## Supervising task ########
Route::controller(SupervisorTasksController::class)->prefix('supervisingTask')->group(function () { 
    Route::get('/duties','supervisorTask')->name('supervisorTask');
    Route::post('/dutyStore','supervisorTaskStore')->name('supervisorTask.store');
    Route::post('/show', 'show')->name('supervisingTask.show');

});

######## Followup team  ########
Route::controller(followupTeamController::class)->prefix('followupTeam')->group(function () { 
    Route::get('/bring_leaders','bring_leaders')->name('followupTeam.bring_leaders');
    Route::get('/bring_supervisors','bring_supervisors')->name('followupTeam.bring_supervisors');
    Route::post('/store_leader','followupTeamDuty_leader_store')->name('followupTeam.leader_store');
    Route::post('/store_supervisor','followupTeamDuty_supervisor_store')->name('followupTeam.supervisor_store');
    Route::post('/leader_show', 'followupTeamDuty_show_leader')->name('followupTeam.leader_show');
    Route::post('/supervisor_show', 'followupTeamDuty_show_supervisor')->name('followupTeam.supervisor_show');

});

######## leader  ########
Route::controller(LeaderController::class)->prefix('leader')->group(function () { 
    Route::get('/create/{type_page}','create')->name('leader.create');
    Route::get('/listAll','listAll')->name('listAll');
    Route::get('/listBy/{type_page}/{user_id}','listBy')->name('listBy');
    Route::get('/manipulatLeader/{type_page}/{leader_id}','manipulatLeader')->name('manipulatLeader');
    Route::post('/manipulatLeaderStore','manipulatLeaderStore')->name('manipulatLeader.store');
    Route::get('/transferLeader/{leader_id}','transferLeader')->name('transferLeader');
    Route::post('/transferLeaderStore','transferLeaderStore')->name('transferLeader.store');
    Route::get('/withoutSupervisor','withoutSupervisor')->name('withoutSupervisor');
    Route::get('/designation','designation')->name('designation');
    Route::get('/designationStore','designationStore')->name('designation.store');

});

######## Followup team  ########
Route::controller(WeekController::class)->prefix('week')->group(function () { 
    Route::get('/create','create')->name('week');
});


