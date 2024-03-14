<?php

use App\Http\Controllers\Tarefa\TarefaController;

Route::middleware('auth')->group(function () {
  Route::get('/tarefa', [TarefaController::class, 'index'])->name('tarefa.index');
  Route::post('/tarefa/store', [TarefaController::class, 'store'])->name('tarefa.store');
  Route::delete('/tarefa/{tarefa}', [TarefaController::class, 'destroy'])->name('tarefa.destroy');
  Route::put('/tarefa/update', [TarefaController::class, 'update'])->name('tarefa.update');
  Route::put('/tarefas/{tarefa}', [TarefaController::class, 'updateStatus'])->name('tarefa.updatestatus');
  Route::get('/tarefa/selecionar-aba/{aba}', [TarefaController::class, 'selecionarAba'])->name('tarefa.selecionar_aba');
  Route::get('/tarefas/filtrar/{funcionario_id}', [TarefaController::class, 'filtrarPorFuncionario'])->name('tarefas.filtrar_por_funcionario');
});



