@extends('layouts.app')

@section('content')
  @php
    $active_tab_tarefa = session('active_tab_tarefa');
    if (!$active_tab_tarefa) {
        $active_tab_tarefa = 'executar';
        session(['active_tab_tarefa' => $active_tab_tarefa]);
    }
  @endphp
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
                  <button class="btn btn-success fw-bolder w-100" aria-current="page" data-bs-toggle="modal"
                    data-bs-target="#tarefacreate">ADICIONAR TAREFA</button>
                </li>
                <li class="nav-item mb-lg-0 mx-2">
                  <div class="dropdown">
                    <button class="btn btn-light fw-bolder dropdown-toggle w-100" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      FUNCIONÁRIOS
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      @foreach ($funcionarios as $funcionario)
                        <li>
                          <a class="dropdown-item {{ request('funcionario_id') == $funcionario->id ? 'active' : '' }}"
                            href="{{ route('tarefas.filtrar_por_funcionario', ['funcionario_id' => $funcionario->id]) }}">
                            {{ $funcionario->user->name }}
                          </a>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      @endif
      <ul id="tarefa" role="tablist"
        class="nav nav-tabs nav-pills with-arrow lined flex-column flex-sm-row text-center">
        <li class="nav-item flex-sm-fill position-relative">
          <a id="executar-tab" href="{{ route('tarefa.selecionar_aba', ['aba' => 'executar']) }}" role="tab"
            aria-controls="executar" aria-selected="{{ session('active_tab_tarefa') == 'executar' ? 'true' : 'false' }}"
            class="nav-link text-uppercase rounded-0 fw-bolder {{ !session('active_tab_tarefa') || session('active_tab_tarefa') == 'executar' ? 'active' : '' }}">
            Executar
            @if (count($tarefas->where('status', 'executar')) > 0)
              <span class="position-absolute start-50 translate-middle badge rounded-pill bg-danger top-0">
                {{ count($tarefas->where('status', 'executar')) }}
              </span>
            @endif
          </a>
        </li>
        <li class="nav-item flex-sm-fill position-relative">
          <a id="executando-tab" href="{{ route('tarefa.selecionar_aba', ['aba' => 'executando']) }}" role="tab"
            aria-controls="executando"
            aria-selected="{{ session('active_tab_tarefa') == 'executando' ? 'true' : 'false' }}"
            class="nav-link text-uppercase rounded-0 fw-bolder {{ session('active_tab_tarefa') == 'executando' ? 'active' : '' }}">
            Executando
            @if (count($tarefas->where('status', 'executando')) > 0)
              <span class="position-absolute start-50 translate-middle badge rounded-pill bg-danger top-0">
                {{ count($tarefas->where('status', 'executando')) }}
              </span>
            @endif
          </a>
        </li>
        <li class="nav-item flex-sm-fill position-relative">
          <a id="pendente-tab" href="{{ route('tarefa.selecionar_aba', ['aba' => 'pendente']) }}" role="tab"
            aria-controls="pendente" aria-selected="{{ session('active_tab_tarefa') == 'pendente' ? 'true' : 'false' }}"
            class="nav-link text-uppercase rounded-0 fw-bolder {{ session('active_tab_tarefa') == 'pendente' ? 'active' : '' }}">
            Pendente
            @if (count($tarefas->where('status', 'pendente')) > 0)
              <span class="position-absolute start-50 translate-middle badge rounded-pill bg-danger top-0">
                {{ count($tarefas->where('status', 'pendente')) }}
              </span>
            @endif
          </a>
        </li>
        <li class="nav-item flex-sm-fill position-relative">
          <a id="finalizado-tab" href="{{ route('tarefa.selecionar_aba', ['aba' => 'finalizado']) }}" role="tab"
            aria-controls="finalizado"
            aria-selected="{{ session('active_tab_tarefa') == 'finalizado' ? 'true' : 'false' }}"
            class="nav-link text-uppercase rounded-0 fw-bolder {{ session('active_tab_tarefa') == 'finalizado' ? 'active' : '' }}">
            Finalizado
            @if (count($tarefas->where('status', 'finalizado')) > 0)
              <span class="position-absolute start-50 translate-middle badge rounded-pill bg-danger top-0">
                {{ count($tarefas->where('status', 'finalizado')) }}
              </span>
            @endif
          </a>
        </li>
        <li class="nav-item flex-sm-fill position-relative">
          <a id="correcao-tab" href="{{ route('tarefa.selecionar_aba', ['aba' => 'correcao']) }}" role="tab"
            aria-controls="correcao" aria-selected="{{ session('active_tab_tarefa') == 'correcao' ? 'true' : 'false' }}"
            class="nav-link text-uppercase rounded-0 fw-bolder {{ session('active_tab_tarefa') == 'correcao' ? 'active' : '' }}">
            Correção
            @if (count($tarefas->where('status', 'correcao')) > 0)
              <span class="position-absolute start-50 translate-middle badge rounded-pill bg-danger top-0">
                {{ count($tarefas->where('status', 'correcao')) }}
              </span>
            @endif
          </a>
        </li>
      </ul>
      <div id="tarefaContent" class="tab-content">
        <div id="executar" role="tabpanel" aria-labelledby="executar-tab"
          class="tab-pane fade {{ !session('active_tab_tarefa') || session('active_tab_tarefa') == 'executar' ? 'show active' : '' }} px-4 py-5">
          @include('tarefa.tabContent.executar')
        </div>
        <div id="executando" role="tabpanel" aria-labelledby="executando-tab"
          class="tab-pane fade {{ session('active_tab_tarefa') == 'executando' ? 'show active' : '' }} px-4 py-5">
          @include('tarefa.tabContent.executando')
        </div>
        <div id="pendente" role="tabpanel" aria-labelledby="pendente-tab"
          class="tab-pane fade {{ session('active_tab_tarefa') == 'pendente' ? 'show active' : '' }} px-4 py-5">
          @include('tarefa.tabContent.pendente')
        </div>
        <div id="finalizado" role="tabpanel" aria-labelledby="finalizado-tab"
          class="tab-pane fade {{ session('active_tab_tarefa') == 'finalizado' ? 'show active' : '' }} px-4 py-5">
          @include('tarefa.tabContent.finalizado')
        </div>
        <div id="correcao" role="tabpanel" aria-labelledby="correcao-tab"
          class="tab-pane fade {{ session('active_tab_tarefa') == 'correcao' ? 'show active' : '' }} px-4 py-5">
          @include('tarefa.tabContent.correcao')
        </div>
      </div>
    </div>
  </section>
  @if (auth()->user()->chefe)
    @include('tarefa.create')
  @endif

@endsection
