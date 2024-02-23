@extends('layouts.app')

@section('content')
  <section id="tarefa-index">

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
                  <button class="btn btn-success fw-bolder w-100" aria-current="page">ADICIONAR TAREFA</button>
                </li>
                <li class="nav-item mb-lg-0 mx-2">
                  <div class="dropdown">
                    <button class="btn btn-light fw-bolder dropdown-toggle w-100" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      FUNCIONÁRIOS
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      @foreach ($funcionarios as $funcionario)
                        <li><a class="dropdown-item" href="#">{{ $funcionario->user->name }}</a></li>
                      @endforeach
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      @endif
      <ul id="myTab2" role="tablist"
        class="nav nav-tabs nav-pills with-arrow lined flex-column flex-sm-row text-center">
        <li class="nav-item flex-sm-fill">
          <a id="executar-tab" data-bs-toggle="tab" href="#executar" role="tab" aria-controls="executar"
            aria-selected="true" class="nav-link text-uppercase active rounded-0 fw-bolder">executar</a>
        </li>
        <li class="nav-item flex-sm-fill">
          <a id="executando-tab" data-bs-toggle="tab" href="#executando" role="tab" aria-controls="executando"
            aria-selected="false" class="nav-link text-uppercase rounded-0 fw-bolder">executando</a>
        </li>
        <li class="nav-item flex-sm-fill">
          <a id="pendente-tab" data-bs-toggle="tab" href="#pendente" role="tab" aria-controls="pendente"
            aria-selected="false" class="nav-link text-uppercase rounded-0 fw-bolder">pendente</a>
        </li>
        <li class="nav-item flex-sm-fill">
          <a id="finalizado-tab" data-bs-toggle="tab" href="#finalizado" role="tab" aria-controls="finalizado"
            aria-selected="false" class="nav-link text-uppercase rounded-0 fw-bolder">finalizado</a>
        </li>
        <li class="nav-item flex-sm-fill">
          <a id="correcao-tab" data-bs-toggle="tab" href="#correcao" role="tab" aria-controls="correcao"
            aria-selected="false" class="nav-link text-uppercase rounded-0 fw-bolder">correcão</a>
        </li>
      </ul>
      <div id="myTabContent" class="tab-content">
        <div id="executar" role="tabpanel" aria-labelledby="executar-tab" class="tab-pane fade show active px-4 py-5">
          <p class="leade font-italic">Conteúdo da aba executar</p>
        </div>
        <div id="executando" role="tabpanel" aria-labelledby="executando-tab" class="tab-pane fade px-4 py-5">
          <p class="leade font-italic">Conteúdo da aba executando</p>
        </div>
        <div id="pendente" role="tabpanel" aria-labelledby="pendente-tab" class="tab-pane fade px-4 py-5">
          <p class="leade font-italic">Conteúdo da aba pendente</p>
        </div>
        <div id="finalizado" role="tabpanel" aria-labelledby="finalizado-tab" class="tab-pane fade px-4 py-5">
          <p class="leade font-italic">Conteúdo da aba finalizado</p>
        </div>
        <div id="correcao" role="tabpanel" aria-labelledby="correcao-tab" class="tab-pane fade px-4 py-5">
          <p class="leade font-italic">Conteúdo da aba correção</p>
        </div>
      </div>
    </div>
  </section>
@endsection
