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
                <button id="submitButton" class="btn btn-success fw-bolder w-100" aria-current="page"
                  data-bs-toggle="modal" data-bs-target="#create-arquivo">SUBIR ARQUIVO</button>
              </li>
              <li class="nav-item mb-lg-0 mx-2 mb-2">
                <a href="{{ route('cliente.show', ['cliente' => $projeto->id_cliente]) }}" class="btn btn-light">
                  VOLTAR PERFIL
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <ul id="myTab2" role="tablist"
        class="nav nav-tabs nav-pills with-arrow lined flex-column flex-sm-row text-center">
        <li class="nav-item flex-sm-fill">
          <a id="engenharia-tab" data-bs-toggle="tab" href="#engenharia" role="tab" aria-controls="engenharia"
            aria-selected="true" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 active">ENGENHARIA</a>
        </li>
        <li class="nav-item flex-sm-fill">
          <a id="eletrica-tab" data-bs-toggle="tab" href="#eletrica" role="tab" aria-controls="eletrica"
            aria-selected="false" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0">ELETRICA</a>
        </li>
        <li class="nav-item flex-sm-fill">
          <a id="hidraulica-tab" data-bs-toggle="tab" href="#hidraulica" role="tab" aria-controls="hidraulica"
            aria-selected="false" class="nav-link text-uppercase font-weight-bold rounded-0">HIDRAULICA</a>
        </li>
        <li class="nav-item flex-sm-fill">
          <a id="arquitetura-tab" data-bs-toggle="tab" href="#arquitetura" role="tab" aria-controls="arquitetura"
            aria-selected="false" class="nav-link text-uppercase font-weight-bold rounded-0">ARQUITETURA</a>
        </li>
      </ul>

      <div class="fw-bolder alert alert-dark mb-0 mt-2" id="alert-arquivo" style="display: none;">
        Aguarde enquanto o arquivo está sendo carregado... A página estará temporariamente indisponível até que o
        processo seja concluído.
        <div class="progress" style="display: ;">
          <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
            aria-valuemin="0" aria-valuemax="100">0%</div>
        </div>
      </div>

      <div class="tab-content" id="TabContentArquivo">
        <div class="tab-pane fade show active px-4 py-4" id="engenharia" role="tabpanel" aria-labelledby="engenharia-tab">
          @include('arquivo.tabContent.engenharia')
        </div>
        <div class="tab-pane fade px-4 py-5" id="eletrica" role="tabpanel" aria-labelledby="eletrica-tab">
          @include('arquivo.tabContent.eletrica')
        </div>
        <div class="tab-pane fade px-4 py-5" id="hidraulica" role="tabpanel" aria-labelledby="hidraulica-tab">
          @include('arquivo.tabContent.hidraulica')
        </div>
        <div class="tab-pane fade px-4 py-5" id="arquitetura" role="tabpanel" aria-labelledby="arquitetura-tab">
          @include('arquivo.tabContent.arquitetura')
        </div>
      </div>
    </div>
  </section>

  @include('arquivo.create')
@endsection
