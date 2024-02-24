<?php

use App\Http\Controllers\Tarefa\TarefaController;

Route::middleware('auth')->group(function () {
  Route::get('/tarefa', [TarefaController::class, 'index'])->name('tarefa.index');
  Route::post('/tarefa/store', [TarefaController::class, 'store'])->name('tarefa.store');
  Route::delete('/tarefa/{tarefa}', [TarefaController::class, 'destroy'])->name('tarefa.destroy');
  Route::put('/tarefas/{tarefa}', [TarefaController::class, 'update'])->name('tarefa.update');

});



