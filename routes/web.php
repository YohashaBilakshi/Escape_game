<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

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
    return view('auth.login1');
});
Route::get('/aa', function () {
    return view('history');
});
Route::get('/showGameRoom', function () {
    return view('room.room_1');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/puzzel', [GameController::class, 'getPuzzel'])->name('getPuzzel');
    Route::get('/escape-game', [GameController::class, 'showGameRoom'])->name('showGameRoom');
});
