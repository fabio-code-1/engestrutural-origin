@extends('layouts.app')

@section('content')
  <section class="h-100 d-flex justify-content-center align-items-center h-100 w-100 overflow-auto" id="home">
    <div class="card my-2" style="max-width: 840px;">
      <div class="row g-0">
        <div class="col-md-4">
          <div class="d-none d-md-block">
            <img src="/images/auth/logo_eng.jpeg" class="img-fluid rounded-start" alt="...">
          </div>
        </div>
        <div class="col-md-8">
          <div class="card-header bg-dark text-light">{{ 'Painel de Controle' }}</div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert-success alert accordion" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <p>
              Bem-vindo ao seu painel de controle <b>{{ ucwords(Auth::user()->name) }}</b> ! Aqui, você pode gerenciar
              seus
              projetos,
              colaborar com sua equipe e
              acompanhar o progresso de suas construções.
            </p>
            <p>
              'Sinta-se à vontade para explorar as ferramentas e recursos disponíveis para otimizar seus fluxos de
              trabalho e aumentar a produtividade.
            </p>
            <p>
              Se tiver alguma dúvida ou precisar de assistência, não hesite em entrar em contato com nossa equipe de
              suporte.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
