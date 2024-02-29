<?php

use App\Http\Controllers\Cliente\ClienteController;

Route::middleware('auth')->group(function () {
  Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');
  Route::post('/cliente/store', [ClienteController::class, 'store'])->name('cliente.store');
  Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('cliente.show');
  Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('cliente.destroy');
  Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('cliente.update');
});