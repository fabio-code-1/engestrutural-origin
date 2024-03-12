<!-- Modal -->
<div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="createLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('cliente.store') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header bg-dark text-light">
          <h5 class="modal-title" id="createLabel">NOVO CLIENTE</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-4">
            <label for="nome" class="form-label fw-bolder">NOME:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
          </div>

          <div class="form-group mb-4">
            <label for="email" class="form-label fw-bolder">EMAIL:</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Exemple@....">
          </div>

          <div class="form-group mb-4">
            <label for="cnpj" class="form-label fw-bolder">CNPJ:</label>
            <input type="text" id="cnpj" name="cnpj" class="form-control">
          </div>

          <div class="form-group mb-4">
            <label for="cpf" class="form-label fw-bolder">CPF:</label>
            <input type="text" id="cpf" name="cpf" class="form-control">
          </div>

          <div class="form-group">
            <label for="telefone" class="form-label fw-bolder">TELEFONE:</label>
            <input type="tel" id="telefone" name="telefone" class="form-control">
          </div>

        </div>
        <div class="modal-footer bg-dark">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CANCELAR</button>
          <button type="submit" class="btn btn-success">CRIAR CLIENTE</button>
        </div>
      </div>
    </form>
  </div>
</div>
