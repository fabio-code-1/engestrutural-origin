<?php

use App\Http\Controllers\Projeto\ProjetoController;

Route::middleware('auth')->group(function () {
  Route::post('/projeto/store', [ProjetoController::class, 'store'])->name('projeto.store');
});