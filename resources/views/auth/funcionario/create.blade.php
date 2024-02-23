@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <form method="POST" action="{{ route('funcionario.store') }}">
      @csrf
      <input type="hidden" name="chefe_id" value="{{ auth()->id() }}">

      <div class="mb-4">
        <label for="name" class="fw-bolder text-secondary">NOME:</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
          value="{{ old('name') }}" required autocomplete="name" autofocus>
      </div>

      <div class="mb-4">
        <label for="email" class="fw-bolder text-secondary">EMAIL:</label>
        <input placeholder="exemple@engestrutural.com" id="email" type="email"
          class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required
          autocomplete="email">
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
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
          autocomplete="new-password" placeholder="********">
      </div>

      <select class="form-select" aria-label="Selecione sua profissão" name="cargo">
        <option selected disabled>Selecione area de atuação</option>
        <option value="arquiteto">ARQUITETURA</option>
        <option value="engenheiro">ENGENHARIA</option>
        <option value="eletrica">ELETRICA</option>
        <option value="hidraulica">HIDRAULICA</option>
      </select>

      <div class="mb-4">
        <label for="salario" class="fw-bolder text-secondary">SALÁRIO:</label>
        <input id="salario" type="number" step="0.01" class="form-control" name="salario" autocomplete="salario">
      </div>

      <div class="d-grid col-6 mx-auto mt-4 gap-2">
        <button class="btn btn-dark fw-bolder" type="submit">REGISTRAR-SE</button>
      </div>

    </form>
  </div>
@endsection
