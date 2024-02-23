<?php

use App\Http\Controllers\Tarefa\TarefaController;

Route::middleware('auth')->group(function () {
  Route::get('/tarefa', [TarefaController::class, 'index'])->name('tarefa.index');
});



