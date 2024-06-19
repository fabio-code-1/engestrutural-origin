<?php

use App\Http\Controllers\Financeiro\FinanceiroController;

Route::middleware('auth')->group(function () {
  Route::get('/financeiro', [FinanceiroController::class, 'index'])->name('financeiro.index');

  Route::get('/financeiro/create', [FinanceiroController::class, 'create'])->name('financeiro.create');

  Route::post('/financeiro/store', [FinanceiroController::class, 'store'])->name('financeiro.store');
});