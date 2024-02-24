<!-- Modal -->
<div class="modal fade" id="tarefacreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="tarefacreateLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('tarefa.store') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header bg-dark text-light">
          <h5 class="modal-title" id="tarefacreateLabel">NOVA TAREFA</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="funcionario" class="form-label">FUNCIONARIO:</label>
            <select id="funcionario" name="funcionario" class="form-select" required>
              @foreach ($funcionarios as $funcionario)
                <option value="{{ $funcionario->id }}">{{ $funcionario->user->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" id="titulo" name="titulo" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="3" required></textarea>
          </div>

          <div class="form-group">
            <label for="prazo" class="form-label">Prazo:</label>
            <input type="date" id="prazo" name="prazo" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="prioridade" class="form-label">Prioridade:</label>
            <select id="prioridade" name="prioridade" class="form-control" required>
              <option value="baixa">Baixa</option>
              <option value="media">Média</option>
              <option value="alta">Alta</option>
            </select>
          </div>

          <div class="form-group">
            <label for="status" class="form-label">Status:</label>
            <select id="status" name="status" class="form-select" required>
              <option value="executar">Executar</option>
              <option value="executando">Executando</option>
              <option value="pendente">Pendente</option>
              <option value="finalizado">Finalizado</option>
              <option value="correcao">Correção</option>
            </select>
          </div>

        </div>
        <div class="modal-footer bg-dark">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CANCELAR</button>
          <button type="submit" class="btn btn-success">CRIAR TAREFA</button>
        </div>
      </div>
    </form>
  </div>
</div>
