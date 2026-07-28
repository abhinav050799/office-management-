<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->group(function(){
Route::get('/login', 'loginForm')->name('login');
Route::get('/register', 'registerForm')->name('register');
Route::post('/registeruser', 'register')->name('registeruser');
Route::post('/loginUser', 'login')->name('login');
Route::get('/dashboard','dashboard')->name('dashboard');
});
