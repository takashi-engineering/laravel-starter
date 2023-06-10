<?php

use App\Http\Controllers\Tweet\CreateController;
use App\Http\Controllers\Tweet\IndexController;
use App\Http\Controllers\Tweet\Update\IndexController as UpdateIndexController;
use App\Http\Controllers\Tweet\Update\PutController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sample', [\App\Http\Controllers\Sample\IndexController::class, 'show']);
Route::get('/sample/{id}', [\App\Http\Controllers\Sample\IndexController::class, 'showId']);
Route::get('/tweet', IndexController::class)->name('tweet.index');
Route::post('tweet/create', CreateController::class)->name('tweet.create');
Route::get('/tweet/update/{tweetId}', UpdateIndexController::class)->name('tweet.update.index');
Route::put('/tweet/update/{tweetId}', PutController::class)->name('tweet.update.put');
