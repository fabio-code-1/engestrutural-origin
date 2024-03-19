<!-- Modal de Edição -->
@foreach ($projetos as $projeto)
  <div class="modal fade" id="editProjeto{{ $projeto->id }}" tabindex="-1"
    aria-labelledby="editProjetoLabel{{ $projeto->id }}" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ route('projeto.update', ['projeto' => $projeto->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-content">
          <div class="modal-header bg-dark text-light">
            <h5 class="modal-title" id="editProjetoLabel{{ $projeto->id }}">EDITAR PROJETO {{ $projeto->id }}.</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <div class="form-group mb-4">
              <label for="status" class="form-label fw-bolder">STATUS:</label>
              <select class="form-select" id="status" name="status">
                <option value="0" {{ $projeto->status == 0 ? 'selected' : '' }}>Executando</option>
                <option value="1" {{ $projeto->status == 1 ? 'selected' : '' }}>Finalizado</option>
              </select>
            </div>

            <div class="form-group mb-4">
              <label for="nome" class="form-label fw-bolder">NOME:</label>
              <input type="text" id="nome" name="nome" class="form-control" required
                value="{{ $projeto->nome }}">
            </div>

            <div class="form-group mb-4">
              <label for="descricao" class="form-label fw-bolder">DESCRIÇÃO:</label>
              <textarea class="form-control" id="descricao" name="descricao">{{ $projeto->descricao }}</textarea>
            </div>

            <div class="form-group mb-4">
              <label for="valor_arquitetonico" class="form-label fw-bolder">VALOR ARQUITETÔNICO:</label>
              <input type="text" class="form-control input-valor" id="valor_arquitetonico" name="valor_arquitetonico"
                value="{{ $projeto->valor_arquitetonico }}">
            </div>

            <div class="form-group mb-4">
              <label for="valor_estrutural" class="form-label fw-bolder">VALOR ESTRUTURAL:</label>
              <input type="text" class="form-control input-valor" id="valor_estrutural" name="valor_estrutural"
                value="{{ $projeto->valor_estrutural }}">
            </div>

            <div class="form-group mb-4">
              <label for="valor_hidraulica" class="form-label fw-bolder">VALOR HIDRAULICA:</label>
              <input type="text" class="form-control input-valor" id="valor_hidraulica" name="valor_hidraulica"
                value="{{ $projeto->valor_hidraulica }}">
            </div>

            <div class="form-group mb-4">
              <label for="valor_eletrica" class="form-label fw-bolder">VALOR ELETRICA:</label>
              <input type="text" class="form-control input-valor" id="valor_eletrica" name="valor_eletrica"
                value="{{ $projeto->valor_eletrica }}">
            </div>
          </div>
          <div class="modal-footer bg-dark">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CANCELAR</button>
            <button type="submit" class="btn btn-success">SALVAR ALTERAÇÕES</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endforeach
