@extends('layouts.app')

@section('content')
  <section id="financeiro-index">
    <div class="p-md-4">
      <p class="bg-dark p-2 text-center">
        <a href="{{ route('financeiro.index') }}" class="btn btn-light">Voltar lista de agendamentos</a>
      </p>

      <div class="card">
        <div class="card-header fw-bolder">Marcar Pagamento</div>
        <div class="card-body">
          <form method="POST" action="{{ route('financeiro.store') }}">
            @csrf
            <div class="form-group row mb-2">
              <label for="cliente" class="col-md-4 col-form-label text-md-right">Cliente</label>
              <div class="col-md-6">
                <select id="cliente" class="form-select" name="cliente" required>
                  <option value="" selected disabled>Escolha um cliente</option>
                  @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}"
                      data-projetos="{{ json_encode($cliente->projetos->pluck('nome', 'id')) }}">{{ $cliente->nome }}
                    </option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row mb-2">
              <label for="projeto" class="col-md-4 col-form-label text-md-right">Projeto</label>
              <div class="col-md-6">
                <select id="projeto" class="form-select" name="projeto" required>
                  <option value="" selected disabled>Escolha um projeto</option>
                </select>
              </div>
            </div>

            <div class="form-group row mb-2">
              <label for="categoria_pagamento" class="col-md-4 col-form-label text-md-right">Categoria do
                Pagamento</label>
              <div class="col-md-6">
                <select id="categoria_pagamento" class="form-select" name="categoria_pagamento" required>
                  <option value="" selected disabled>Escolha categoria de pagamento</option>
                  <option value="arquitetonico">Arquitetônico</option>
                  <option value="estrutural">Estrutural</option>
                  <option value="eletrica">Elétrica</option>
                  <option value="hidraulica">Hidráulica</option>
                  <option value="todos">Todos</option>
                </select>
              </div>
            </div>

            <div class="form-group row mb-2">
              <label for="pagamento" class="col-md-4 col-form-label text-md-right">Valor do Pagamento</label>
              <div class="col-md-6">
                <input type="text" class="form-control input-valor" id="pagamento" name="pagamento" required>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label for="forma_pagamento" class="col-md-4 col-form-label text-md-right">Forma de Pagamento</label>
              <div class="col-md-6">
                <select id="forma_pagamento" class="form-select" name="forma_pagamento" required>
                  <option value="debito">Débito</option>
                  <option value="credito">Crédito</option>
                  <option value="boleto">Boleto</option>
                  <option value="pix">PIX</option>
                </select>
              </div>
            </div>

            <div class="form-group row d-none mb-3" id="parcelamento-group">
              <label for="parcela" class="col-md-4 col-form-label text-md-right">Parcelamento</label>
              <div class="col-md-6">
                <input type="number" class="form-control" id="parcela" name="parcela" min="0"
                  placeholder="Caso seja a vista deixa em branco" required>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label for="data_pagamento" class="col-md-4 col-form-label text-md-right">Data de Pagamento</label>
              <div class="col-md-6">
                <input type="date" class="form-control" id="data" name="data_pagamento" required>
              </div>
            </div>

            <div class="d-grid d-md-block gap-2 text-center">
              <button class="btn btn-success" type="submit">AGENDAR PAGAMENTO</button>
            </div>
          </form>
        </div>
      </div>

  </section>
@endsection
