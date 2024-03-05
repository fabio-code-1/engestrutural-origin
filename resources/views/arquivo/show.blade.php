@extends('layouts.app')

@section('content')
  <section id="arquivo-show">
    <div class="p-md-4">
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
                  data-bs-target="#create-arquivo">SUBIR ARQUIVO</button>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </section>

  <h2>Arquivos do Projeto</h2>
  <ul>
    @foreach ($arquivos as $arquivo)
      <li>
        <span>Nome do Arquivo: {{ $arquivo->nome }}</span>
        <span>
          <a href="{{ asset('storage/' . $arquivo->files) }}" download="{{ $arquivo->nome }}">Download</a>
        </span>
        <span>
          <form action="{{ route('arquivo.destroy', $arquivo) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Excluir</button>
          </form>
        </span>
      </li>
    @endforeach
  </ul>

  @include('arquivo.create')
@endsection
