<?php

use App\Http\Controllers\Arquivo\ArquivoController;

Route::middleware('auth')->group(function () {
  Route::get('/arquivo', [ArquivoController::class, 'index'])->name('arquivo.index');
});