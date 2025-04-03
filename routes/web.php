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
    return view('auth.login');
});
Route::get('/readme', function () {
    return view('readme');
});
Route::get('/showGameRoom', function () {
    return view('room.room_1');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', [GameController::class, 'showHome'])->name('dashboard');
    Route::get('/puzzel', [GameController::class, 'getPuzzel'])->name('getPuzzel');
    Route::get('/escape-game/{id}', [GameController::class, 'showGameRoom'])->name('showGameRoom');
    Route::get('/game-complete/{id}/{time}', [GameController::class, 'gameComeplete'])->name('showGameRoom');
});
