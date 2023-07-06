<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GameController;
use Illuminate\Http\Request;
use App\Events\WatchGameEvent;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PlayController;
use App\Http\Controllers\AuthController;
use App\Events\PlayGameEvent;
use App\Http\Controllers\TempController;
use App\Http\Controllers\MoveController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WatchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Auth
// Route::get('/login', [AuthController::class, 'login']);
// Route::post('/login', [AuthController::class, 'check']);
// Route::get('/register', [AuthController::class, 'register']);
// Route::post('/register', [AuthController::class, 'create']);
// Route::get('/logout', [AuthController::class, 'logout']);

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login');
    Route::post('/login', 'check');
    Route::get('/register', 'register');
    Route::post('/register', 'create');
    Route::get('/logout', 'logout');
});
// Main
Route::get('/home', [MainController::class, 'play']);
Route::get('/watch', [MainController::class, 'watch']);
Route::get('/leaderboard', [MainController::class, 'leaderboard']);
// Play
Route::get('/play/start', [PlayController::class, 'start']);
Route::get('/play/join', [PlayController::class, 'join']);
Route::get('/play/join/link/{id}', [PlayController::class, 'link']);
Route::post('/play/start/over', [PlayController::class, 'result']);
Route::post('/gameOver', [PlayController::class, 'gameOver']);
Route::post('/updateRating', [PlayController::class, 'updateRating']);
// Watch
Route::get('/watch', [WatchController::class, 'runningGames']);
Route::get('/watchGame/{id}', [WatchController::class, 'watchGame']);
Route::get('/review/{id}', [WatchController::class, 'reviewGame']);
// Temp
Route::post('/up', [TempController::class, 'up']);
Route::get('/down', [TempController::class, 'down']);
// Profile
Route::get('/profile', [ProfileController::class, 'profile']);
Route::get('/profile/{id}', [ProfileController::class, 'viewProfile']);
Route::get('/editProfile', [ProfileController::class, 'editProfile']);
Route::post('/updateInfo', [ProfileController::class, 'updateInfo']);
Route::post('updatePassword', [ProfileController::class, 'updatePassword']);


