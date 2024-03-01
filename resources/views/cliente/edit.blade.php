<!-- Modal de Edição -->
<div class="modal fade" id="editModal{{ $cliente->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $cliente->id }}"
  aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header bg-dark text-light">
          <h5 class="modal-title" id="editModalLabel{{ $cliente->id }}">EDITAR CLIENTE</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-4">
            <label for="nome" class="form-label fw-bolder">NOME:</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ $cliente->nome }}"
              required>
          </div>

          <div class="form-group mb-4">
            <label for="email" class="form-label fw-bolder">EMAIL:</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $cliente->email }}"
              required>
          </div>

          <div class="form-group mb-4">
            <label for="rg" class="form-label fw-bolder">RG:</label>
            <input type="text" id="rg" name="rg" class="form-control" value="{{ $cliente->rg }}">
          </div>

          <div class="form-group mb-4">
            <label for="cpf" class="form-label fw-bolder">CPF:</label>
            <input type="text" id="cpf" name="cpf" class="form-control" value="{{ $cliente->cpf }}">
          </div>

          <div class="form-group">
            <label for="telefone" class="form-label fw-bolder">TELEFONE:</label>
            <input type="tel" id="telefone" name="telefone" class="form-control" value="{{ $cliente->telefone }}">
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
