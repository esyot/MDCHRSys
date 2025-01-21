<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaveFormController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonalDetailController;
use App\Http\Controllers\TravelFormController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-submit', [LoginController::class, 'login'])->name('login-submit');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/account', [AccountController::class, 'index']);

    Route::post('/personal-details-update-submit', [PersonalDetailController::class, 'updatePersonalDetails']);

    Route::get('/forms/travel-form-request', [TravelFormController::class, 'index']);
    Route::get('/forms/leave-form-request', [LeaveFormController::class, 'index']);
});


Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
});
