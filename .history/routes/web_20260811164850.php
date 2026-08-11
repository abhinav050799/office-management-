<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\leaveController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\notificationController;
use App\Http\Controllers\expensesController;
use App\Http\Controller\circularController;
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
Route::get('/getAllBirthday','getAllBirthday')->name('getAllBirthday');

Route::get('totalLeave','totalLeave')->name('totalLeave');
Route::get('TotalTakenLeave','TotalTakenLeave')->name('TotalTakenLeave');
});


Route::controller(leaveController::class)->group(function(){
    Route::get('leaveView','leaveView')->name('leaveView');
    // Route::get('AllLeaveData','AllLeaveData')->name('AllLeaveData');
    Route::post('leaveInsert','leaveInsert')->name('leaveInsert');
    Route::get('getidData','getidData')->name('getidData');
    Route::post('updateLeave','updateLeave')->name('updateLeave');
    Route::post('deleteLeave','deleteLeave')->name('deleteLeave');
});


Route::controller(AttendanceController::class)->group(function(){
Route::post('timein','timein')->name('timein');
Route::post('timeout','timeout')->name('timeout');
Route::get('getAlluserAttendance','getAlluserAttendance')->name('getAlluserAttendance');
});


Route::controller(notificationController::class)->group(function(){
    Route::get('notification','notificationPage')->name('notificationPage');
    Route::post('notificationInsert','notificationInsert')->name('notificationInsert');
    Route::post('notificationread','notificationRead')->name('notificationread');
    Route::get('NotificationCount','NotificationCount')->name('NotificationCount');
});

Route::controller(expensesController::class)->group(function(){
Route::get('expenses', 'index')->name('expenses');
Route::post('expenses/store', 'store')->name('expenses.store');
Route::post('expenses/update/{id}', 'update')->name('expenses.update');
Route::delete('expenses/delete/{id}', 'destroy')->name('expenses.dlt');
});

Route::controller(circu)
