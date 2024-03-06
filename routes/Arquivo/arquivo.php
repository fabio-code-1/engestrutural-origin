<?php

use App\Http\Controllers\Arquivo\ArquivoController;

Route::middleware('auth')->group(function () {
  Route::get('/arquivo/{projeto}', [ArquivoController::class, 'index'])->name('arquivo.index');
  Route::post('/arquivos', [ArquivoController::class, 'store'])->name('arquivo.store');
  Route::delete('/arquivos/{arquivo}', [ArquivoController::class, 'destroy'])->name('arquivo.destroy');
});