<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SkpdController;
use App\Http\Controllers\UserController;

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

// Login-Logout
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Index Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Manajemen User
Route::resource('/dashboard/manajemen-user', UserController::class)->parameters([
    'manajemen-user' => 'user',
])->middleware(['auth', 'admin']);

// Daftar SKPD
Route::resource('/dashboard/daftar-skpd', SkpdController::class)->parameters([
    'daftar-skpd' => 'skpd'
])->middleware(['auth', 'admin']);

// Setting
Route::get('/dashboard/setting/', [UserController::class, 'setting'])->middleware('auth');
Route::put('/dashboard/setting/{user}', [UserController::class, 'settingStore'])->middleware('auth');

// Agenda Harian
Route::get('/dashboard/agenda-harian', [EventController::class, 'index'])->middleware('auth');
Route::post('/dashboard/agenda-harian', [EventController::class, 'storeEvent'])->middleware('auth');
Route::get('/dashboard/agenda-harian/fetch', [EventController::class, 'fetch'])->middleware('auth');
Route::put('/dashboard/agenda-harian/{event}', [EventController::class, 'updateEvent'])->middleware('auth');
