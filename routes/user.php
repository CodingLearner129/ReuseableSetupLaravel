<?php

use App\Http\Controllers\SignupController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::prefix('user')->group(function () {
    Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup');
    Route::post('/signup', [SignupController::class, 'signup'])->name('signup.submit');

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
        Route::get('/my-profile', [UserController::class, 'myProfile'])->name('myProfile');
        Route::get('/edit-profile', [UserController::class, 'editProfile'])->name('editProfile');
        Route::put('/update-profile', [UserController::class, 'updateProfile'])->name('updateProfile');
        Route::get('/change-password', [UserController::class, 'changePasswordForm'])->name('changePasswordForm');
        Route::post('/change-password', [UserController::class, 'changePassword'])->name('changePassword');
    });
});
