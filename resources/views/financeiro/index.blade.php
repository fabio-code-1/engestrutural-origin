@extends('layouts.app')

@section('content')
  <section id="financeiro-index">
    <div class="p-md-4">
      <div class="row">
        <div class="col-8 grafico-vendas" data-projetos="{{ $projetosJson }}">
          <canvas id="myChart-venda" class="w-100" height="400"></canvas>
        </div>
        <div class="col">
          <p>teste</p>
        </div>
      </div>
    </div>
    {{-- <div class="d-flex justify-content-center align-items-center bg-dark py-2 text-center">
        <input class="form-control w-50 me-2" type="text" id="searchInput" placeholder="Pequisar nome do cliente...">
      </div>
      <table class="table-light table shadow" id="projetos_table">
        <thead class="table-primary">
          <tr class="text-center align-middle">
            <th scope="col">#</th>
            <th scope="col">NOME</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($projetos as $projeto)
            <tr class="text-center align-middle">
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $projeto->nome }}</td>
            </tr>
          @endforeach
        </tbody>
      </table> --}}

    </div>
  </section>
@endsection
