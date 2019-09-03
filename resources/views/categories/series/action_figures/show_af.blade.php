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
      @foreach($action_figures as $action_figure)
        <img class="card-ing-top text-center">
        <div class="card-body text-center">
          <div class="card-title">
            <h3>{{ $action_figure->name }}</h3>
          </div>
          <p class="card-text">
            <br>
            <b>Connected Series:</b> @if ($action_figure->serie_id == 1)
              Spiderman
            @elseif ($action_figure->serie_id == 2)
              Angel's Friends
            @elseif ($action_figure->serie_id == 3)
              Shugo Chara
            @endif
            <br>
            <b>Price:</b> {{ $action_figure->price }}€
            <br>
            <b>Height:</b> {{ $action_figure->height }}cm
            <br>
            <b>Material:</b> {{ $action_figure->material }}
            <br>
            <b>Year Of Production:</b> {{ $action_figure->year_of_production }}
            <br>
            <b>Stock Inventory:</b> {{ $action_figure->quantity }}
          </p>
          <a href="{{ action('ActionFiguresController@edit', $action_figure->id)}}" class="btn btn-warning mt-4 mr-4" method="POST">Edit</a>
          <a href="{{ action('ActionFiguresController@index') }}" class="btn btn-secondary mt-4 ml-4">Back</a>
        </div>
      @endforeach
    </div>
  </div>
@endsection
