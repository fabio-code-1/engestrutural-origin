@extends('layouts.app')

@section('content')
  <section id="financeiro-index">
    <div class="p-md-4">
      <p class="bg-dark p-2 text-center">
        <a href="{{ route('financeiro.create') }}" class="btn btn-success">Criar Agendamento</a>
      </p>

      <div class="card mt-3">
        <div class="card-header fw-bolder">Pagamentos de Hoje</div>
        <div class="card-body overflow-y-auto p-2" style="height: 30vh">
          {{-- <h5 class="text-center">Sem pagamentos agendados para hoje</h5> --}}
          <table class="table-striped table-warning table">
            <thead>
              <tr>
                <th scope="col">Cliente</th>
                <th scope="col">Categoria Pagamento</th>
                <th scope="col">Projeto</th>
                <th scope="col">Forma Pagamento</th>
                <th scope="col">Pagamento</th>
                <th scope="col">Parcela</th>
                <th scope="col">Data Pagamento</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($financeiros as $financeiro)
                <tr>
                  <td>{{ $financeiro->cliente->nome }}</td>
                  <td>{{ $financeiro->categoria_pagamento }}</td>
                  <td>{{ $financeiro->projeto->nome }}</td>
                  <td>{{ $financeiro->forma_pagamento }}</td>
                  <td>{{ $financeiro->pagamento }}</td>
                  <td>{{ $financeiro->parcela }}</td>
                  <td>{{ $financeiro->data_pagamento }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </div>

    </div>
  </section>
@endsection
