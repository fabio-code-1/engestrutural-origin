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
                <div class="card-body text-center">
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
          <div class="card h-100 text-center shadow">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        @if (auth()->user()->chefe)
          <div class="col">
            <div class="card h-100 shadow">
              <div class="card-body">
                <h5 class="card-title text-center">CONTROLE</h5>
                <div class="d-grid col-6 mx-auto mt-4 gap-2">
                  <button class="btn btn-primary" type="button">NOVO PROJETO</button>
                  <button class="btn btn-success" type="button">PAGAMENTO</button>
                  <button class="btn btn-warning edit-button" type="button"
                    data-cliente="{{ $cliente->id }}">EDITAR</button>
                  <form id="deleteForm{{ $cliente->id }}"
                    action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger delete-button w-100" type="button"
                      data-cliente="{{ $cliente->id }}">DELETAR</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        @endif
      </div>
      <div class="row mt-md-5 mt-1">
        <dov class="col">
          <div class="card overflow-auto shadow">
            <div class="card-body" style="height: 55vh">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>

            </div>
          </div>
        </dov>
      </div>

    </div>
  </section>

  @if (auth()->user()->chefe)
    @include('cliente.edit')
  @endif
@endsection
