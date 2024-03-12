@extends('layouts.guest')

@section('content')
  <section id="authentication_pass">
    <div class="d-flex justify-content-center align-items-center h-100 container">
      <div class="card" id="card-authentication_pass">
        <h5 class="card-header bg-dark text-light">Necessária senha para efetuar registro!</h5>
        <div class="card-body">
          @if (session('error'))
            <h5 class="text-header text-danger fw-bolder text-center">{{ session('error') }}</h5>
          @endif
          <form method="POST" action="{{ route('authenticate') }}">
            @csrf
            <div>
              <label for="password" class="fw-bolder text-secondary">SENHA:</label>
              <input class="form-control" type="password" name="password" id="password" placeholder="Digite a senha...">
            </div>
            <div class="d-grid col-6 mx-auto mt-4 gap-2">
              <button class="btn btn-dark fw-bolder" type="submit">ENTRAR</button>
            </div>
          </form>
        </div>
        <div class="card-footer border-0">
          <p class="fst-italic text-dark fw-bolder">Registro reservado apenas para administradores.
            <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
          </p>
        </div>
      </div>
    </div>
  </section>
@endsection
