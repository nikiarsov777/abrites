<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserMiddleware;

Route::get('/', function () {
    return view('main');
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

Route::group(['prefix' => 'users', 'middleware' => [UserMiddleware::class]], function() {
    Route::get('/config', [App\Http\Controllers\Auth\UserController::class,'config'])->name('config');
    Route::post('/update/{id}', [App\Http\Controllers\Auth\UserController::class,'update']);
    Route::get('/list', [App\Http\Controllers\Auth\UserController::class,'index'])->name('user_list');

    Route::get('/catalog', [App\Http\Controllers\Auth\UserController::class,'catalog'])->name('user_catalog');
    Route::get('/{id}', [App\Http\Controllers\Auth\UserController::class,'show'])->name('user_update');
    Route::post('/delete/{id}', [App\Http\Controllers\Auth\UserController::class,'delete'])->name('user_delete');
});

// Route::group(['prefix' => 'catalog', 'middleware' => [UserMiddleware::class]], function() {
    Route::group(['prefix' => 'catalog'], function() {
    Route::get('/', [App\Http\Controllers\Auth\UserCatalogController::class,'index'])->name('catalog');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('2fa')->name('home');

Route::get('2fa', [App\Http\Controllers\TwoFAController::class, 'index'])->name('2fa.index');
Route::post('2fa', [App\Http\Controllers\TwoFAController::class, 'store'])->name('2fa.post');
Route::get('2fa/reset', [App\Http\Controllers\TwoFAController::class, 'resend'])->name('2fa.resend');
Route::get('/users/verify/mail/{id}', [App\Http\Controllers\Auth\LoginRegisterController::class, 'verify']);
Route::post('/users/resend/mail/{id}', [App\Http\Controllers\Auth\LoginRegisterController::class, 'resend']);
