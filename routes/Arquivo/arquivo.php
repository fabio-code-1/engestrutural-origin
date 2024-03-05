<?php

use App\Http\Controllers\Arquivo\ArquivoController;

Route::middleware('auth')->group(function () {
  Route::get('/arquivo/{projeto}', [ArquivoController::class, 'show'])->name('arquivo.show');
  Route::post('/arquivos', [ArquivoController::class, 'store'])->name('arquivo.store');
  Route::delete('/arquivos/{arquivo}', [ArquivoController::class, 'destroy'])->name('arquivo.destroy');
});