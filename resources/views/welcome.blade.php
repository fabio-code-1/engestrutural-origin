@extends('layouts.guest')

@section('content')
  <div class="form-group">
    <label for="cpf" class="form-label">CPF:</label>
    <input type="text" id="cpf" name="cpf" class="form-control" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
      title="Digite um CPF válido">
  </div>

  <div class="form-group">
    <label for="telefone" class="form-label">Telefone:</label>
    <input type="tel" id="telefone" name="telefone" class="form-control" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}"
      title="Digite um telefone válido">
  </div>
@endsection
