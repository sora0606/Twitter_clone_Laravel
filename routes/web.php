<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\LikeController;
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
    return view('layouts.front');
});

Auth::routes();

//会員登録
Route::any('/home',             [UserController::class, 'index'])->name('home');
Route::get('/register',         function (){ return view('auth.register'); });
Route::post('/register',        [UserController::class, 'store'])->name('register');
Route::get('/login',            function (){ return view('auth.login'); });
Route::post('/login',           [UserController::class, 'login'])->name('login');


//ツイート機能
Route::post('/create/tweet',    [TweetController::class, 'store'])->name('/create/tweet');