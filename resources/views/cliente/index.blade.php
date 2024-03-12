@extends('layouts.app')

@section('content')
  <section id="cliente-index">
    <div class="p-md-4">
      @if (auth()->user()->chefe)
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">FERRAMENTAS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
              aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse justify-content-lg-center collapse" id="navbarNavAltMarkup">
              <ul
                class="navbar-nav d-flex flex-lg-row flex-column justify-content-center justify-content-lg-between mb-lg-0 mb-2">
                <li class="nav-item mb-lg-0 mx-2 mb-2">
                  <button class="btn btn-success fw-bolder w-100" aria-current="page" data-bs-toggle="modal"
                    data-bs-target="#create">ADICIONAR CLIENTE</button>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      @endif

      <div class="d-flex justify-content-center align-items-center bg-dark py-2 text-center">
        <input class="form-control w-50 me-2" type="text" id="searchInput" placeholder="Pequisar nome do cliente...">
      </div>

      <table class="table-light table shadow" id="clientes_table">
        <thead class="table-primary">
          <tr class="text-center align-middle">
            <th scope="col">#</th>
            <th scope="col">NOME</th>
            <th scope="col">EMAIL</th>
            <th scope="col">CNPJ</th>
            <th scope="col">CPF</th>
            <th scope="col">TELEFONE</th>
            <th scope="col">AÇÃO</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($clientes as $cliente)
            <tr class="text-center align-middle">
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $cliente->nome }}</td>
              <td>{!! $cliente->email ? $cliente->email : '<i class="bi bi-dash-lg"></i>' !!}</td>
              <td>{!! $cliente->cnpj ? $cliente->cnpj : '<i class="bi bi-dash-lg"></i>' !!}</td>
              <td>{!! $cliente->cpf ? $cliente->cpf : '<i class="bi bi-dash-lg"></i>' !!}</td>
              <td>{!! $cliente->telefone ? $cliente->telefone : '<i class="bi bi-dash-lg"></i>' !!}</td>
              <td>
                <a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}" class="btn btn-dark">PERFIL</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </section>

  @if (auth()->user()->chefe)
    @include('cliente.create')
  @endif
@endsection
