<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('optimize', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('clear-compiled');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');

    return "Optimized successfully!";
});

// setTimeZone
// Route::get('setTimeZone', [HomeController::class, 'setTimeZone'])->name('setTimeZone');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Route::get('forgot-password/{user_type}', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgot.showLinkRequestForm');
Route::post('forgot-password/{user_type}', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forgot.sendResetLinkEmail');
Route::get('reset-password', [ResetPasswordController::class, 'showResetForm'])->name('reset.showResetForm');
Route::post('reset-password/{token}/{user_type}', [ResetPasswordController::class, 'resetPassword'])->name('reset.resetPassword');

Route::get('password-reset-success', function(){
    return view('custom_auth.reset-password-success');
})->name('password-reset-success');
