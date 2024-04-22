<?php

use Illuminate\Support\Facades\Route;
use Google\Client;
use Google\Service\Oauth2;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('index');
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/plants/{plant}', 'PlantController@show')->name('plants.show');
Route::get('/social/login/google/callback', [SocialLoginController::class, 'callback'])->name('social.login.google');

