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

Route::get('/leader/add', function () {
    return view('leader.add');
});
Route::get('/duty/followup-team', function () {
    return view('duties.followup-team');
});
Route::get('/duty/supervising-team', function () {
    return view('duties.supervising-team');
});
Route::get('/duty/super-duties', function () {
    return view('duties.super-duties');
});
