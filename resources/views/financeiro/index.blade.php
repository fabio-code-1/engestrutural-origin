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
          <table class="table-warning table-striped table">
            <thead>
              <tr>

                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>

              <tr>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>

              <tr>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>

    </div>
  </section>
@endsection
