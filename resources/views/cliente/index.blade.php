@extends('layouts.app')

@section('content')
  <section id="arquivo-index">
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
                <li class="nav-item mb-lg-0 mx-2">
                  <div class="dropdown">
                    <button class="btn btn-light fw-bolder dropdown-toggle w-100" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      CLIENTES
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">fsd</a></li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      @endif

      <div class="d-flex justify-content-center align-items-center bg-dark py-2 text-center">
        <input class="form-control w-50 me-2" type="text" name="" id="" placeholder="Search...">
        <button class="btn btn-primary">Pesquisar</button>
      </div>

      <table class="table-light table shadow" id="clientes_table">
        <thead class="table-primary">
          <tr>
            <th scope="col">#</th>
            <th scope="col">NOME</th>
            <th scope="col">EMAIL</th>
            <th scope="col">RG</th>
            <th scope="col">CPF</th>
            <th scope="col">TELEFONE</th>
            <th scope="col">AÇÃO</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($clientes as $cliente)
            <tr>
              <th scope="row">{{ $cliente->id }}</th>
              <td>{{ $cliente->nome }}</td>
              <td>{{ $cliente->email }}</td>
              <td>{{ $cliente->rg }}</td>
              <td>{{ $cliente->cpf }}</td>
              <td>{{ $cliente->telefone }}</td>
              <td><button>show</button><button>show</button></td>
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
