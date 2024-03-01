<?php

use App\Http\Controllers\Projeto\ProjetoController;

Route::middleware('auth')->group(function () {
  Route::post('/projeto/store', [ProjetoController::class, 'store'])->name('projeto.store');
  Route::put('/projeto/{projeto}', [ProjetoController::class, 'update'])->name('projeto.update');
  Route::delete('/projeto/{projeto}', [ProjetoController::class, 'destroy'])->name('projeto.destroy');
});