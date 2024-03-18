<?php

use App\Http\Controllers\Financeiro\FinanceiroController;

Route::middleware('auth')->group(function () {
  Route::get('/financeiro', [FinanceiroController::class, 'index'])->name('financeiro.index');
});