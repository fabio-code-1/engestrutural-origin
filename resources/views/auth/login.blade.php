@extends('layouts.guest')

@section('content')
  <section id="login">
    <div class="h-100 container-fluid" id="container-login">
      <div class="d-flex h-100 justify-content-center align-items-center">
        <div class="card" id="card-login">
          <div class="card-header bg-light d-flex justify-content-center align-items-center border-0"
            id="card-header-login">
            <div class="bg-dark text-light d-flex flex-column justify-content-center align-items-center text-center"
              id="header-login">
              <h1 class="mb-0 mt-1">LOGIN</h1>
              <p class="fw-bolder mb-1">{{ config('app.name', 'Laravel') }}</p>
            </div>
          </div>
          <div class="card-body mx-4 mb-2 mt-5">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="mb-4">
                <label for="email" class="fw-bolder text-secondary">EMAIL:</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                  name="email" placeholder="exemple@engestrutural.com" value="{{ old('email') }}" required
                  autocomplete="email" autofocus>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-4">
                <label for="password" class="fw-bolder text-secondary">SENHA:</label>
                <input id="password" type="password" class="form-control mb-3" placeholder="********" name="password"
                  required autocomplete="current-password">
              </div>

              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                  {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                  Relembra-me
                </label>
              </div>

              <div class="d-grid col-6 mx-auto mt-4 gap-2">
                <button class="btn btn-dark" type="submit">ENTRAR</button>
              </div>
            </form>

            <div class="card-footer bg-light mt-2 border-0 text-center">
              <p>Possui alguma conta?
                <a href="{{ route('register') }}" class="text-primary fw-bolder text-decoration-none">Registre-se</a>
              </p>
              {{-- <p >
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a>
              </p> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
