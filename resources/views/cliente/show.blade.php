@extends('layouts.app')

@section('content')
  <section id="cliente-show">
    <div class="container">
      <div class="row mt-5">
        <div class="col-6">
          <div class="card mb-3 shadow" style="max-width: 100%;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="/images/auth/sem-foto.gif" class="img-fluid h-100 border" alt="sem foto">
              </div>
              <div class="col-md-8">
                <div class="card-header">
                  <h5 class="card-title text-uppercase text-center">{{ $cliente->nome }}</h5>
                </div>
                <div class="card-body text-center" style="height: 20vh">
                  <p class="card-text"><b>EMAIL:</b> {!! $cliente->email ? $cliente->email : '<i class="bi bi-dash-lg"></i>' !!}</p>
                  <p class="card-text"><b>RG:</b> {!! $cliente->rg ? $cliente->rg : '<i class="bi bi-dash-lg"></i>' !!}</p>
                  <p class="card-text"><b>CPF:</b> {!! $cliente->cpf ? $cliente->cpf : '<i class="bi bi-dash-lg"></i>' !!}</p>
                  <p class="card-text"><b>TELEFONE:</b> {!! $cliente->telefone ? $cliente->telefone : '<i class="bi bi-dash-lg"></i>' !!}</p>
                </div>
                <div class="card-footer">
                  <p class="card-text text-center">
                    <small class="text-muted">DATA DE CRIAÇÃO: {{ $cliente->created_at->format('d/m/Y') }}</small>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card text-center shadow">
            <div class="card-header">
              <h5 class="card-title">ULTIMAS ATUALIZAÇÕES</h5>
            </div>
            <div class="card-body overflow-auto" style="height: 20vh">
              <div class="alert alert-primary">
                <p class="card-text mb-0"><b>ARQUITETURA:</b> FABIO </p>
                <p class="card-text mb-0"><b>PROJETO:</b> teste </p>
                <p class="card-text"><b>ARQUIVO:</b> fachada - 06:30:12 </p>
              </div>
            </div>
            <div class="card-footer">
              <p class="card-text text-center">
                <small class="text-muted">detalhes atualizados recentementes</small>
              </p>
            </div>
          </div>
        </div>
        @if (auth()->user()->chefe)
          <div class="col">
            <div class="card shadow">
              <div class="card-header">
                <h5 class="card-title text-center">CONTROLE</h5>
              </div>
              <div class="card-body"
                style="height: 20vh; display: flex; flex-direction: column; justify-content: space-between;">
                <button class="btn btn-primary create-projeto-button w-100" data-cliente="{{ $cliente->id }}"
                  type="button">NOVO PROJETO</button>
                <button class="btn btn-success w-100" type="button">PAGAMENTO</button>
                <button class="btn btn-warning edit-button w-100" type="button"
                  data-cliente="{{ $cliente->id }}">EDITAR</button>
                <form id="deleteForm{{ $cliente->id }}"
                  action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger delete-button w-100" type="button"
                    data-cliente="{{ $cliente->id }}">DELETAR</button>
                </form>
              </div>

              <div class="card-footer">
                <p class="card-text text-center">
                  <small class="text-muted">gerenciamento de projetos</small>
                </p>
              </div>
            </div>
          </div>
        @endif
      </div>
      <div class="row mt-md-5 mt-1">
        <dov class="col">
          <div class="card overflow-auto shadow">
            <div class="card-body" style="height: 55vh">
              <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid d-flex align-items-center">
                  <h3 class="navbar-brand text-uppercase fw-bolder">Projetos do Cliente</h3>
                  <div class="d-flex">
                    <input class="form-control me-2" type="search" id="searchInputProjeto"
                      placeholder="Pesquisar projeto...">
                  </div>
                </div>
              </nav>

              <table class="table-light table shadow" id="projeto_table">
                <thead class="table-primary">
                  <tr class="text-center align-middle">
                    <th scope="col">#</th>
                    <th scope="col">NOME</th>
                    <th scope="col">DESCRIÇÂO</th>
                    <th scope="col">STATUS</th>
                    @if (auth()->user()->chefe)
                      <th scope="col">ARQUITETÔNICO</th>
                      <th scope="col">ESTRUTURAL</th>
                      <th scope="col">HIDRAULICA</th>
                      <th scope="col">ELETRICA</th>
                      <th scope="col">TOTAL</th>
                    @endif
                    <th scope="col">AÇÃO</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($projetos as $projeto)
                    <tr class="text-center align-middle">
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $projeto->nome }}</td>
                      <td>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showProjeto"
                          data-descricao="{{ $projeto->descricao }}" data-titulo="{{ $projeto->nome }}">
                          <i class="bi bi-zoom-in"></i>
                        </button>
                      </td>

                      @if ($projeto->status === 0)
                        <td class="bg-info fw-bolder">
                          Executando
                        </td>
                      @else
                        <td class="fw-bolder" style="background-color: rgb(205, 241, 151)">
                          Finalizado
                        </td>
                      @endif

                      @if (auth()->user()->chefe)
                        <td>{!! $projeto->valor_arquitetonico ? $projeto->valor_arquitetonico : '<i class="bi bi-dash-lg"></i>' !!}</td>
                        <td>{!! $projeto->valor_estrutural ? $projeto->valor_estrutural : '<i class="bi bi-dash-lg"></i>' !!}</td>
                        <td>{!! $projeto->valor_hidraulica ? $projeto->valor_hidraulica : '<i class="bi bi-dash-lg"></i>' !!}</td>
                        <td>{!! $projeto->valor_eletrica ? $projeto->valor_eletrica : '<i class="bi bi-dash-lg"></i>' !!}</td>
                        <td>{!! $projeto->valor_arquitetonico +
                            $projeto->valor_estrutural +
                            $projeto->valor_hidraulica +
                            $projeto->valor_eletrica !!}
                        </td>
                      @endif
                      <td>
                        <a href="{{ route('arquivo.index', ['projeto' => $projeto->id]) }}" class="btn btn-dark">
                          <i class="fs-4 bi bi-file-earmark-arrow-up-fill"></i>
                        </a>
                        @if (auth()->user()->chefe)
                          <button class="btn btn-warning edit-projeto-button" data-projeto="{{ $projeto->id }}">
                            <i class="fs-4 bi bi-pencil-fill"></i>
                          </button>

                          <a href="{{ route('projeto.destroy', ['projeto' => $projeto->id]) }}" class="btn btn-danger"
                            onclick="event.preventDefault(); if(confirm('Tem certeza que deseja excluir este projeto?')) document.getElementById('delete-form-{{ $projeto->id }}').submit();">
                            <i class="bi bi-trash3-fill fs-4"></i>
                          </a>
                          <form id="delete-form-{{ $projeto->id }}"
                            action="{{ route('projeto.destroy', ['projeto' => $projeto->id]) }}" method="POST"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                          </form>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </dov>
      </div>

    </div>
  </section>

  @if (auth()->user()->chefe)
    @include('cliente.edit')
    @include('projeto.create')
    @if (isset($projeto))
      @include('projeto.edit')
    @endif
  @endif
  @include('projeto.show')
@endsection
