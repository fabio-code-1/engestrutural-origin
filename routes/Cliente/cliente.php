<?php

use App\Http\Controllers\Cliente\ClienteController;

Route::middleware('auth')->group(function () {
  Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');
  Route::post('/cliente/store', [ClienteController::class, 'store'])->name('cliente.store');
});