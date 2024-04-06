<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
  <div id="app">
    <main>
      <div class="container-fluid">
        <div class="row flex-nowrap">
          @include('layouts.navbar')
          <div class="col" id="app-conteudo">
            <button class="btn btn-dark fw-bolder w-100" aria-current="page" data-bs-toggle="modal"
              data-bs-target="#create">
              <i class="bi bi-clock-history"></i>
            </button>
            @yield('content')
          </div>
        </div>
      </div>
    </main>
  </div>
  @if (auth()->user()->chefe)
    @include('ponto.create')
  @endif
</body>

</html>
