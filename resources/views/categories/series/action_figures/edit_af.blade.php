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
    <div class="offset-lg-2 col-lg-8">
      <div class="row mb-4 justify-content-center">
        <h1>Edit Action Figure</h1>
      </div>
      <div class="mt-4 col-lg-6 offset-lg-3">
      @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      @foreach($action_figures as $action_figure)
        <form action="{{ action('ActionFiguresController@update', $action_figure->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="{{ $action_figure->name }}">
          </div>
          <div class="form-group">
            <label>Connected Series</label>
            <input class="form-control" type="text" name="connected_series" value="{{ $action_figure->serie_id }}">
          </div>
          <div class="form-group">
            <label>Price</label>
            <input class="form-control" type="float" name="price" value="{{ $action_figure->price }}">
          </div>
          <div class="form-group">
            <label>Height</label>
            <input class="form-control" type="integer" name="height" value="{{ $action_figure->height }}">
          </div>
          <div class="form-group">
            <label>Material</label>
            <input class="form-control" type="text" name="material" value="{{ $action_figure->material }}">   {{-- date? datetime? --}}
          </div>
          <div class="form-group">
            <label>Year Of Production</label>
            <input class="form-control" type="integer" name="year_of_production" value="{{ $action_figure->year_of_production }}">
          </div>
          <div class="form-group">
            <label>Media</label>
            <input class="form-control" type="text" name="media" value="{{ $action_figure->media }}">
          </div>
          <div class="form-group">
            <label>Quantity</label>
            <input class="form-control" type="integer" name="quantity" value="{{ $action_figure->quantity }}">
          </div>
          <button class="btn btn-warning" type="submit">Update</button>    {{-- method="PUT" ? --}}
          <a href="{{ action('ActionFiguresController@index') }}" class="btn btn-default">Back</a>
        </form>
      @endforeach
    </div>
    </div>
  </div>
@endsection
