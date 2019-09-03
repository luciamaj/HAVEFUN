@extends('layouts.app')

@section('navbar')
  @if (auth()->user()->isAdmin == 2)
      {{-- <li class="nav-item">
        <a class="nav-link" href="/permissions">Permissions</a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" href="/categories">Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/series">Series</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/comics">Comics</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/action_figures">ActionFigures</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/users_list">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/data_management">DeletedItem</a>
      </li>
  @elseif (auth()->user()->isAdmin == 1)
    <li class="nav-item">
      <a class="nav-link" href="/categories">Categories</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/series">Series</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/comics">Comics</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/action_figures">ActionFigures</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/users_list">Users</a>
    </li>
  @else
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
      <a class="nav-link" href="/action_figures">ActionFigures</a>
    </li>
  @endif
@endsection

@section('content')
  <div class="container-fluid">
    <div class="card col-lg-4 offset-lg-4">
        {{--<img class="card-ing-top text-center" alt="{{ $comic->media }}">     ??? --}}
        <div class="card-body text-center">
          <div class="card-title">
            <h3>{{ $comic->name }}</h3>
          </div>
          <p class="card-text">
            <br>
            <b>Category:</b> {{ $comic->serie->category->category }}
            <br>
            <b>Series:</b> {{ $comic->serie->name }}
            <br>
            <b>Exit Number:</b> {{ $comic->exit_number }}
            <br>
            <b>Exit Date:</b> {{ \Carbon\Carbon::parse($comic->exit_date)->format('d/m/Y') }}
            <br>
            <b>Editorial Series:</b> {{ $comic->editorial_series }}
            <br>
            <b>Publisher:</b> {{ $comic->publisher }}
            <br>
            <b>Price:</b> {{ $comic->price }}€
            <br>
            <b>ISBN:</b> {{ $comic->barcode }}
            <br>
            <b>Rarity:</b> @if (($comic->rare_id) != 0)
              Rare
            @elseif (($comic->rare_id) == 0)
              Normal
            @endif
            @if (($comic->rare_id) != 0)
              <br>
              <b>Number of copies in the World:</b> {{ $comic->rare->circulation }}
              <br>
              <b>Attual condition:</b> @if (($comic->rare->condition) == 1)
                Usato
              @elseif (($comic->rare->condition) == 2)
                Nuovo
              @endif
            @endif
            <br>
            <b>Stock Inventory:</b> {{ $comic->quantity }}
          </p>
          <a href="{{ action('ComicsController@edit', $comic->id)}}" class="btn btn-warning mt-4 mr-4" method="POST">Edit</a>
          <a href="{{ action('ComicsController@index') }}" class="btn btn-secondary mt-4 ml-4">Back</a>
        </div>
    </div>
  </div>
@endsection
