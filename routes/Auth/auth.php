<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthenticationPassController;

Auth::routes();

Route::middleware('auth')->group(function () {
  Route::get('/', [HomeController::class, 'index'])->name('home');
});

Route::get('/authentication/pass', [AuthenticationPassController::class, 'index'])->name('authentication.pass');
Route::post('/authenticate', [AuthenticationPassController::class, 'authenticate'])->name('authenticate');


