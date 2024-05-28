<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\UserMiddleware;

Route::get('/', function () {
    return view('main');
});

Route::group(['prefix' => 'users', 'middleware' => [UserMiddleware::class]], function() {
    // Route::get('/register', 'UserController@register')->name('register');
    // // Route::post('/store', 'store')->name('store');
    
    // // Route::post('/authenticate', 'authenticate')->name('authenticate');
    // Route::get('/dashboard', 'App\Http\Controllers\UserController@dashboard')->name('dashboard')->middleware('2fa');
    // Route::post('/logout', 'App\Http\Controllers\UserController@logout')->name('logout');
    // Route::get('/logout', 'App\Http\Controllers\UserController@logout');
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('2fa')->name('home');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::post('/authenticate','authenticate')->name('authenticate');
    Route::get('/users/dashboard', 'dashboard')->name('dashboard')->middleware('2fa');
    Route::post('/users/logout', 'logout')->name('logout');
    Route::get('/users/logout', 'logout');
    Route::get('/users/login', 'login')->name('login');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('2fa')->name('home');

Route::get('2fa', [App\Http\Controllers\TwoFAController::class, 'index'])->name('2fa.index');
Route::post('2fa', [App\Http\Controllers\TwoFAController::class, 'store'])->name('2fa.post');
Route::get('2fa/reset', [App\Http\Controllers\TwoFAController::class, 'resend'])->name('2fa.resend');
Route::get('/users/verify/mail/{id}', [App\Http\Controllers\Auth\LoginRegisterController::class, 'verify']);
Route::post('/users/resend/mail/{id}', [App\Http\Controllers\Auth\LoginRegisterController::class, 'resend']);
