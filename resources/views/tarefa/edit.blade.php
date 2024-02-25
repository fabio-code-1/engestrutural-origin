<!-- Modal -->
<div class="modal fade" id="tarefaedit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="tarefaeditLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ route('tarefa.update') }}">
        @csrf
        @method('PUT')
        <div class="modal-header bg-dark text-light">
          <h5 class="modal-title" id="tarefaeditLabel">EDITAR TAREFA</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="idTarefa" name="idTarefa">
          <div class="modal-body">
            <div class="form-group">
              <label for="funcionario" class="form-label">Funcionário:</label>
              <select id="funcionario" name="funcionario" class="form-select" required>
                @foreach ($funcionarios as $funcionario)
                  <option value="{{ $funcionario->id }}"
                    {{ $tarefa->funcionario_id == $funcionario->id ? 'selected' : '' }}>{{ $funcionario->user->name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="titulo" class="form-label">Título:</label>
              <input type="text" id="tituloTarefa" name="titulo" class="form-control" value="{{ $tarefa->titulo }}"
                required>
            </div>

            <div class="form-group">
              <label for="descricao" class="form-label">Descrição:</label>
              <textarea id="descricaoTarefa" name="descricao" class="form-control" rows="3" required>{{ $tarefa->descricao }}</textarea>
            </div>

            <div class="form-group">
              <label for="prazo" class="form-label">Prazo:</label>
              <input type="date" id="prazoTarefa" name="prazo" class="form-control" value="{{ $tarefa->prazo }}"
                required>
            </div>

            <div class="form-group">
              <label for="prioridade" class="form-label">Prioridade:</label>
              <select id="prioridadeTarefa" name="prioridade" class="form-select" required>
                <option value="baixa" {{ $tarefa->prioridade == 'baixa' ? 'selected' : '' }}>Baixa</option>
                <option value="media" {{ $tarefa->prioridade == 'media' ? 'selected' : '' }}>Média</option>
                <option value="alta" {{ $tarefa->prioridade == 'alta' ? 'selected' : '' }}>Alta</option>
              </select>
            </div>

            <div class="form-group">
              <label for="status" class="form-label">Status:</label>
              <select id="statusTarefa" name="status" class="form-select" required>
                <option value="executar" {{ $tarefa->status == 'executar' ? 'selected' : '' }}>Executar</option>
                <option value="executando" {{ $tarefa->status == 'executando' ? 'selected' : '' }}>Executando
                </option>
                <option value="pendente" {{ $tarefa->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="finalizado" {{ $tarefa->status == 'finalizado' ? 'selected' : '' }}>Finalizado
                </option>
                <option value="correcao" {{ $tarefa->status == 'correcao' ? 'selected' : '' }}>Correção</option>
              </select>
            </div>
          </div>

        </div>
        <div class="modal-footer bg-dark">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CANCELAR</button>
          <button type="submit" class="btn btn-success">ATUALIZAR TAREFA</button>
        </div>
      </form>
    </div>
  </div>
</div>
