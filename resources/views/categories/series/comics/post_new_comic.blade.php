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
        <h1>Add New Comic</h1>
      </div>
      <div class="col-md-6 offset-md-3">
        <form action="{{ action('ComicsController@store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="series_id">Series</label>
            <select name="serie_id" class="form-control">
              @foreach($series as $serie)
                <option value="{{ $serie->id }}">{{ $serie->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name" placeholder="Name"/>
          </div>
          <div class="form-group">
            <label>ISBN</label>
            <input class="form-control" type="integer" name="barcode" placeholder="ISBN"/>
          </div>
          <div class="form-group">
            <label>Price</label>
            <input class="form-control" type="float" name="price" placeholder="Price"/>
          </div>
          <div class="form-group">
            <label>Exit Number</label>
            <input class="form-control" type="integer" name="exit_number" placeholder="Exit Number"/>
          </div>
          <div class="form-group">
            <label>Exit Date</label>
            <input class="form-control" type="date" name="exit_date"/>
          </div>
          <div class="form-group">
            <label>Publisher</label>
            <input class="form-control" type="text" name="publisher" placeholder="Publisher"/>
          </div>
          <div class="form-group">
            <label>Editorial Series</label>
            <input class="form-control" type="text" name="editorial_series" placeholder="Editorial Series"/>
          </div>
          <div class="form-group">
            <label for="rare_id">Rarity</label>
              <select name="rare_id" class="form-control showMe">
                  <option selected value="{{1}}">Normal</option>
                  <option>Rare</option>
              </select>
          </div>
          <div class="rare-form">
            <div class="form-group">
              <label>Copies in the world</label>
              <input class="form-control" type="text" name="circulation" placeholder="Copies in the world"/>
            </div>
            <div class="form-group">
              <label>Condition</label>
              <select name="condition" class="form-control">
                  <option selected value="{{1}}">New</option>
                  <option value="{{2}}">Not new</option>
              </select>
            </div>
          </div>
        <div class="form-group">
          <label>Quantity</label>
          <input class="form-control" type="integer" name="quantity" placeholder="Quantity"/>
        </div>
          <button class="btn btn-primary" type="submit">Add</button>
          <a href="{{ action('ComicsController@index') }}" class="btn btn-secondary">Back</a>
        </form>
      </div>
    </div>
  </div>
@endsection
