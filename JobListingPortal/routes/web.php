<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('jobs.index'));

// Guests only
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Logged-in users: create, edit, delete (defined first so /jobs/create is not read as /jobs/{job})
Route::resource('jobs', JobController::class)->except(['index', 'show'])->middleware('auth');

// Public: list and details
Route::resource('jobs', JobController::class)->only(['index', 'show']);
