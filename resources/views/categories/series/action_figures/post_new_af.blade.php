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
    <div class="row offset-md-1">
      @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="col-md-6 offset-md-3">
        <h1>Add New Action Figure</h1>
      </div>
      <div class="col-md-6 offset-md-3">
          <form action="{{ action('ActionFiguresController@store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label>Name</label>
              <input class="form-control" type="text" name="name" placeholder="Name"/>
            </div>
            <div class="form-group">
              <label>Connected Series</label>
              {{-- <input class="form-control" type="text" name="connected_series" placeholder="Connected Series"/> --}}
              <select class="form-control" name="serie_id">

                <option>Select Series</option>

                @foreach ($action_figures->serie_id as $key => $value)
                  <option value="{{ $key }}" {{ ( $key == $selectedID) ? 'selected' : '' }}>
                      {{ $value }}
                  </option>
                @endforeach
              </select>
              <select>
            </div>
            <div class="form-group">
              <label>Price</label>
              <input class="form-control" type="float" name="price" placeholder="Price"/>
            </div>
            <div class="form-group">
              <label>Height</label>
              <input class="form-control" type="integer" name="height" placeholder="Height"/>
            </div>
            <div class="form-group">
              <label>Material</label>
              <input class="form-control" type="text" name="material" placeholder="Material"/>   {{-- date? datetime? --}}
            </div>
            <div class="form-group">
              <label>Year Of Production</label>
              <input class="form-control" type="integer" name="year_of_production" placeholder="yyyy"/>
            </div>
            <div class="form-group">
              <label>Media</label>
              <input class="form-control" type="text" name="media" placeholder="Media"/>
            </div>
            <div class="form-group">
              <label>Quantity</label>
              <input class="form-control" type="integer" name="quantity" placeholder="Quantity"/>
            </div>
            <button class="btn btn-primary" type="submit">Add</button>
            <a href="{{ action('ActionFiguresController@index') }}" class="btn btn-secondary">Back</a>
          </form>
      </div>
    </div>
  </div>
@endsection
