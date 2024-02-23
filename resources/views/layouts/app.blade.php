<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
  <div id="app">
    <main>
      <div class="container-fluid">
        <div class="row flex-nowrap">
          @include('layouts.navbar')
          <div class="col border-primary border-3 border px-1 py-1" id="app-conteudo">
            @yield('content')
          </div>
        </div>
      </div>
    </main>
  </div>
</body>

</html>
