<?php

use App\Http\Controllers\Orcamento\OrcamentoController;

Route::middleware('auth')->group(function () {
  Route::get('/orcamento', [OrcamentoController::class, 'index'])->name('orcamento.index');
});