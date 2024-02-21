@extends('layouts.guest')

@section('content')
  <div class="container">
    @if (session()->has('authenticated') && session('authenticated') === true)
    @else
      <div class="alert alert-danger" role="alert">
        Acesso restrito! Por favor, insira a senha correta para acessar esta página.
      </div>
    @endif
  </div>
@endsection
