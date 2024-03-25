@extends('layouts.app')

@section('content')
  <section id="pagamento-index">

    <div class="p-md-4">
      <div class="row justify-content-center">
        <div class="col-md-8">
          @if (session('success'))
            <div class="toast show align-items-center bg-success fw-bolder text-light w-100" role="alert"
              aria-live="assertive" aria-atomic="true">
              <div class="d-flex">
                <div class="toast-body">
                  {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white m-auto me-2" data-bs-dismiss="toast"
                  aria-label="Close"></button>
              </div>
            </div>
          @endif
          <div class="card">
            <div class="card-header fw-bolder">Adicionar Pagamento</div>

            <div class="card-body">
              <form method="POST" action="{{ route('pagamento.store') }}">
                @csrf
                <div class="form-group row mb-2">
                  <label for="projeto" class="col-md-4 col-form-label text-md-right">Projeto</label>
                  <div class="col-md-6">
                    <select id="projeto" class="form-select" name="projeto_id" required>
                      <option value="" selected disabled>Escolha um projeto</option>
                      @foreach ($projetos as $projeto)
                        <option value="{{ $projeto->id }}">{{ $projeto->nome }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group row mb-2">
                  <label for="categoria_pagamento" class="col-md-4 col-form-label text-md-right">Categoria do
                    Pagamento</label>
                  <div class="col-md-6">
                    <select id="categoria_pagamento" class="form-select" name="categoria_pagamento" required>
                      <!-- Opções de categoria de pagamento serão adicionadas dinamicamente aqui -->
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

                <div class="d-grid d-md-block gap-2 text-center">
                  <button class="btn btn-success" type="submit">EFETUAR PAGAMENTO</button>
                </div>
              </form>
            </div>
          </div>

          <div class="card mt-3">
            <div class="card-header fw-bolder">Pagamentos</div>
            <div class="card-body overflow-auto" style="height: 40vh">

              @foreach ($projetos as $projeto)
                <button class="btn btn-primary w-100" type="button" data-bs-toggle="collapse"
                  data-bs-target="#historico-pagamento-{{ $projeto->id }}" aria-expanded="false"
                  aria-controls="historico-pagamento-{{ $projeto->id }}">
                  {{ $projeto->nome }}
                </button>
                <ul>
                  <div class="collapse mt-1" id="historico-pagamento-{{ $projeto->id }}">
                    <div class="card card-body">
                      <div class="card-header d-flex justify-content-between align-items-center mb-2">
                        <p class="mb-0">Cobranças</p>
                        <p class="mb-0">Legenda -
                          <span class="badge bg-primary">RECEBER</span>
                          <span class="badge bg-success">PAGO</span>
                        </p>

                      </div>
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Valor Arquitetonico</th>
                            <th scope="col">Valor Estrutural</th>
                            <th scope="col">Valor Eletrica</th>
                            <th scope="col">Valor Hidraulica</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @foreach (['arquitetonico', 'estrutural', 'eletrica', 'hidraulica'] as $categoria)
                              @php
                                $total_pagamentos = $projeto->pagamentos
                                    ->where('categoria_pagamento', $categoria)
                                    ->sum(
                                        fn($pagamento) => (float) preg_replace('/[^0-9.]/', '', $pagamento->pagamento),
                                    );

                                $valor_categoria = (float) preg_replace(
                                    '/[^0-9.]/',
                                    '',
                                    $projeto->{'valor_' . $categoria},
                                );

                                $diferenca = $valor_categoria - $total_pagamentos;

                                $classe_celula = $diferenca <= 0 ? 'bg-success' : 'bg-primary';
                              @endphp

                              <td class="{{ $classe_celula }} text-light fw-bolder">
                                R$ {{ number_format($diferenca, 2, ',', '.') }}
                              </td>
                            @endforeach
                          </tr>
                        </tbody>
                      </table>

                      {{-- historico de pagamentos  --}}
                      <div class="card-header d-flex justify-content-between align-items-center mb-2">
                        <p class="mb-0">Histórico de Pagamentos</p>
                      </div>
                      <table class="table">
                        <thead>
                          <tr class="text-center align-middle">
                            <th scope="col">Categoria</th>
                            <th scope="col">Forma de Pagamento</th>
                            <th scope="col">Valor do Pagamento</th>
                            <th scope="col">Data do Pagamento</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($projeto->pagamentos as $pagamento)
                            <tr class="text-center align-middle">
                              <td>{{ $pagamento->categoria_pagamento }}</td>
                              <td>{{ $pagamento->forma_pagamento }}</td>
                              <td>{{ $pagamento->pagamento }}</td>
                              <td>{{ $pagamento->created_at->format('d/m/Y') }}</td>
                              <td>
                                <button href="{{ route('pagamento.destroy', ['pagamento' => $pagamento->id]) }}"
                                  class="btn btn-danger btn-sm"
                                  onclick="event.preventDefault(); if(confirm('Tem certeza que deseja excluir este pagamento?')) document.getElementById('delete-form-{{ $pagamento->id }}').submit();">
                                  <i class="bi bi-trash3-fill fs-4"></i>
                                </button>
                                <form id="delete-form-{{ $pagamento->id }}"
                                  action="{{ route('pagamento.destroy', ['pagamento' => $pagamento->id]) }}"
                                  method="POST" style="display: none;">
                                  @csrf
                                  @method('DELETE')
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </ul>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

  <script>
    // Função para atualizar as opções do select de categoria de pagamento
    function atualizarOpcoesCategoria(projetoId) {
      var selectCategoria = document.getElementById('categoria_pagamento');
      // Limpar as opções existentes
      selectCategoria.innerHTML = '';

      // Adicionar opções com base no projeto selecionado
      if (projetoId) {
        var projeto = @json($projetos);
        projeto = projeto.find(p => p.id == projetoId);
        if (projeto.valor_arquitetonico) {
          selectCategoria.innerHTML += '<option value="arquitetonico">Arquitetônico</option>';
        }
        if (projeto.valor_estrutural) {
          selectCategoria.innerHTML += '<option value="estrutural">Estrutural</option>';
        }
        if (projeto.valor_eletrica) {
          selectCategoria.innerHTML += '<option value="eletrica">Elétrica</option>';
        }
        if (projeto.valor_hidraulica) {
          selectCategoria.innerHTML += '<option value="hidraulica">Hidráulica</option>';
        }
      }
    }

    // Evento de mudança no select de projeto
    document.getElementById('projeto').addEventListener('change', function() {
      atualizarOpcoesCategoria(this.value);
    });
  </script>
@endsection
