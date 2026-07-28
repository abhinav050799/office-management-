<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\leaveController;
Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->group(function(){
Route::get('/login', 'loginForm')->name('login');
Route::get('/register', 'registerForm')->name('register');
Route::post('/registeruser', 'register')->name('registeruser');
Route::post('/loginUser', 'login')->name('loginUser');
Route::get('/dashboard','dashboard')->name('dashboard');
Route::post('/logout', 'logout')->name('logout');
Route::get('/profile', 'profile')->name('profile');
Route::post('/profileUpdate', 'profileUpdate')->name('profileUpdate');
});


Route::controller(leaveController::class)->group(function(){
    Route::get('leaveView','leaveView')->name('leaveView');
    Route::get('AllLeaveData','AllLeaveData')->name('AllLeaveData');
    Route::post('leaveInsert','leaveInsert')-
});
