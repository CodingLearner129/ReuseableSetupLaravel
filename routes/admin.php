<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login'])->name('login.submit');

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/my-profile', [AdminController::class, 'myProfile'])->name('myProfile');
    Route::get('/edit-profile', [AdminController::class, 'editProfile'])->name('editProfile');
    Route::put('/update-profile', [AdminController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/change-password', [AdminController::class, 'changePasswordForm'])->name('changePasswordForm');
    Route::post('/change-password', [AdminController::class, 'changePassword'])->name('changePassword');

    // Users Module
    Route::post('users/data', [UserController::class, 'data'])->name('users.data');
    Route::resource('users', UserController::class)->parameters([
        'users' => 'id'
    ]);
});
