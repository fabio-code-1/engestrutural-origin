@extends('layouts.guest')

@section('content')
  <div>
    <h2>Autenticação Requerida</h2>

    @if (session('error'))
      <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('authenticate') }}">
      @csrf
      <div>
        <label for="password">Senha:</label>
        <input type="password" name="password" id="password">
      </div>
      <div>
        <button type="submit">Entrar</button>
      </div>
    </form>
  </div>
@endsection
