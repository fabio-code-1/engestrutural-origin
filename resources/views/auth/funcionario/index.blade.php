@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <a href="{{ route('funcionario.create') }}" class="nav-link fw-bolder text-dark px-0 align-middle">
      <i class="fs-4 bi bi-person-fill-add"></i><span class="d-none d-sm-inline ms-1">NOVO FUNCIONARIO</span>
    </a>

    <table class="table">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Email</th>
          <th>Cargo</th>
          <th>Salario</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($funcionarios as $funcionario)
          <tr>
            <td>{{ $funcionario->user->name }}</td>
            <td>{{ $funcionario->user->email }}</td>
            <td>{{ $funcionario->cargo }}</td>
            <td>{{ $funcionario->salario }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
@endsection
