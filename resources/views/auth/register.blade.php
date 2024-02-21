@extends('layouts.guest')

@section('content')
  <section id="register-boss">
    @if (session()->has('authenticated') && session('authenticated') === true)
      <div class="h-100 container-fluid">
        <div class="row h-100 p-md-3 p-0">
          <div class="col-md-6 d-none d-md-block rounded-4" id="col-register-img">
            <div class="d-flex h-100 w-100 justify-content-center align-items-center flex-column fw-bold rounded-4">
              <h1 class="text-light fw-bolder">Bem-vindo ao time da Engestrutural</h1>
              <p class="text-light">
                Seja parte de nossa equipe e junte-se a nós na construção de um futuro de sucesso e inovação
              </p>
            </div>
          </div>
          <div class="col-12 col-md-6 px-md-5" id="col-register-form-boss">
            <div class="d-flex h-100 w-100 justify-content-center align-items-center flex-column fw-bold">
              <div class="card w-100 border-0" id="card-form-register-boss">
                <div class="card-header bg-light border-0">
                  <h2 class="fw-bolder">Inscreva-se</h2>
                </div>
                <div class="card-body">
                  <p class="card-text">Digite seu e-mail e senha para se cadastrar.</p>
                  <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-4">
                      <label for="name" class="fw-bolder text-secondary">NOME:</label>
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>

                    <div class="mb-4">
                      <label for="email" class="fw-bolder text-secondary">EMAIL:</label>
                      <input placeholder="exemple@engestrutural.com" id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email">
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="mb-4">
                      <label for="password" class="fw-bolder text-secondary">SENHA:</label>
                      <input id="password" type="password" placeholder="********"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="new-password">
                    </div>

                    <div class="mb-4">
                      <label for="password-confirm" class="fw-bolder text-secondary">COMFIRMA SENHA:</label>
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password" placeholder="********">
                    </div>

                    <div class="d-grid col-6 mx-auto mt-4 gap-2">
                      <button class="btn btn-dark fw-bolder" type="submit">REGISTRAR-SE</button>
                    </div>

                  </form>
                </div>
                <div class="card-footer mt-0 border-0 text-center">
                  <p class="mt-3 text-center">Já tem uma conta?
                    <a href="{{ route('login') }}" class="text-primary fw-bolder text-decoration-none">Login</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @else
      <div class="h-100 justify-content-center align-items-center d-flex">
        <div role="alert" class="alert alert-danger w-md-50 fw-bolder flex-column text-center">
          <p>Acesso restrito! Por favor, insira a senha correta para acessar esta página.</p>
          <a href="{{ route('login') }}" class="fw-bolder btn btn-primary">Login</a>
        </div>
      </div>
    @endif
  </section>
@endsection
