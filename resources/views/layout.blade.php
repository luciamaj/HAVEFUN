<!doctype html>
<html lang="{{ str_replace('_', '_', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Have Fun</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="nav justify-content-center">
      <ul class="nav">
        {{-- <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link" href="/comics">Comics</a>
        </li>
        {{-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="comics">Category1</a>
            <a class="dropdown-item" href="comics">Category2</a>
            <a class="dropdown-item" href="comics">Category3</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Category4</a>
          </div>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link" href="/action_figures">Action Figures</a>
        </li>
      </ul>
    </div>

    <div class="container">
      @yield('content')
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
  </body>
</html>
