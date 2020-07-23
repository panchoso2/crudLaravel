<!DOCTYPE html>
<html>

  <head>
    <title>Administrador de Usuarios @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" >
    <link rel="icon" href="{{ asset('images/webtres-logo.png') }}">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand">Administrador de Usuarios</a>
    </nav>
    @yield('content')
  </body>
</html>