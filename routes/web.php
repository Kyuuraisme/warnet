<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ShiftController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('users', UserController::class);
Route::resource('memberships', MembershipController::class);
Route::resource('computers', ComputerController::class);
Route::resource('games', GameController::class);
Route::resource('sessions', SessionController::class);
Route::resource('transactions', TransactionController::class);
Route::resource('services', ServiceController::class);
Route::resource('orders', OrderController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('shifts', ShiftController::class);
