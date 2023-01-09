<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\SupervisorDutyController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 ########Start leader########
 Route::group(['prefix' => 'leader'], function () {
    Route::get('/', [LeaderController::class, 'index']);
    Route::post('/create', [LeaderController::class, 'create']);
    Route::post('/update', [LeaderController::class, 'update']);
    Route::post('/show', [LeaderController::class, 'show']);
    Route::post('/swap_leader', [LeaderController::class, 'swap_leader']);
    Route::post('/transfer_leader', [LeaderController::class, 'transfer_leader']);
});
 ########Start SupervisorDutyController########
 Route::group(['prefix' => 'supervisorduty'], function () {
    Route::post('/create', [SupervisorDutyController::class, 'create']);
    Route::post('/update', [SupervisorDutyController::class, 'update']);
});
Auth::routes();

