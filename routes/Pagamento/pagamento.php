<?php

use App\Http\Controllers\Pagamento\PagamentoController;

Route::middleware('auth')->group(function () {
  Route::get('/pagamento/{cliente}', [PagamentoController::class, 'index'])->name('pagamento.index');
  Route::post('/pagamento/store', [PagamentoController::class, 'store'])->name('pagamento.store');
});