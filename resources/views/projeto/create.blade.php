<!-- Modal -->
<div class="modal fade" id="createProjeto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="createProjetoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('projeto.store') }}">
      @csrf

      <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
      <div class="modal-content">
        <div class="modal-header bg-dark text-light">
          <h5 class="modal-title" id="createProjetoLabel">NOVO PROJETO</h5>
        </div>
        <div class="modal-body">
          <div class="form-group mb-4">
            <label for="nome" class="form-label fw-bolder">NOME:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
          </div>

          <div class="form-group mb-4">
            <label for="descricao" class="form-label fw-bolder">DESCRIÇÃO:</label>
            <textarea class="form-control" id="descricao" name="descricao"></textarea>
          </div>

          <div class="form-group mb-4">
            <label for="valor_arquitetonico" class="form-label fw-bolder">VALOR ARQUITETÔNICO:</label>
            <input type="text" class="form-control input-valor" id="valor_arquitetonico" name="valor_arquitetonico">
          </div>

          <div class="form-group mb-4">
            <label for="valor_estrutural" class="form-label fw-bolder">VALOR ESTRUTURAL:</label>
            <input type="text" class="form-control input-valor" id="valor_estrutural" name="valor_estrutural">
          </div>

          <div class="form-group mb-4">
            <label for="valor_hidraulica" class="form-label fw-bolder">VALOR HIDRAULICA:</label>
            <input type="text" class="form-control input-valor" id="valor_hidraulica" name="valor_hidraulica">
          </div>

          <div class="form-group mb-4">
            <label for="valor_eletrica" class="form-label fw-bolder">VALOR ELETRICA:</label>
            <input type="text" class="form-control input-valor" id="valor_eletrica" name="valor_eletrica">
          </div>
        </div>
        <div class="modal-footer bg-dark">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CANCELAR</button>
          <button type="submit" class="btn btn-success">CRIAR PROJETO</button>
        </div>
      </div>
    </form>
  </div>
</div>
