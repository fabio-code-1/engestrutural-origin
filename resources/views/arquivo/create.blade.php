<!-- Modal -->
<div class="modal fade" id="create-arquivo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="create-arquivoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('arquivo.store') }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id_projeto" value="{{ $projeto->id }}">
      <div class="modal-content">
        <div class="modal-header bg-dark text-light">
          <h5 class="modal-title" id="create-arquivoLabel">NOVO ARQUIVO</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-4">
            <label for="nome" class="form-label fw-bolder">NOME:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
          </div>
          <div class="form-group mb-4">
            <label for="descricao" class="form-label fw-bolder">DESCRIÇÃO:</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="3"></textarea>
          </div>
          <div class="form-group mb-4">
            <label for="files" class="form-label fw-bolder">ARQUIVO:</label>
            <input type="file" id="files" name="files" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer bg-dark">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CANCELAR</button>
          <button type="submit" class="btn btn-success">CRIAR ARQUIVO</button>
        </div>
      </div>
    </form>

  </div>
</div>
