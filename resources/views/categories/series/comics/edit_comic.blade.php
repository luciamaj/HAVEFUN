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
      @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="row mb-4 justify-content-center">
        <h1>Edit Comic</h1>
      </div>
      <div class="mt-4 col-lg-6 offset-lg-3">
        <form action="{{ action('ComicsController@update', $comic->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category" class="form-control">
              @foreach($categories as $category)
                <option @if(($category->id) == ($comic->serie->category_id)) selected @endif value="{{ $category->id }}">{{ $category->category }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="series_id">Series</label>
            <select name="serie_id" class="form-control">
              @foreach($series as $serie)
                <option @if(($serie->id) == ($comic->serie_id)) selected @endif value="{{ $serie->id }}">{{ $serie->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="{{ $comic->name }}">
          </div>
          <div class="form-group">
            <label>ISBN</label>
            <input class="form-control" type="integer" name="barcode" value="{{ $comic->barcode }}">
          </div>
          <div class="form-group">
            <label>Price</label>
            <input class="form-control" type="float" name="price" value="{{ $comic->price }}">
          </div>
          <div class="form-group">
            <label>Exit Number</label>
            <input class="form-control" type="integer" name="exit_number" value="{{ $comic->exit_number }}">
          </div>
          <div class="form-group">
            <label>Exit Date</label>
            <input class="form-control" type="datetime" name="exit_date" value="{{ \Carbon\Carbon::parse($comic->exit_date)->format('d/m/Y') }}">   {{-- DA RIVEDERE --}}
          </div>
          <div class="form-group">
            <label>Publisher</label>
            <input class="form-control" type="text" name="publisher" value="{{ $comic->publisher }}">
          </div>
          <div class="form-group">
            <label>Editorial Series</label>
            <input class="form-control" type="text" name="editorial_series" value="{{ $comic->editorial_series }}">
          </div>
          <div class="form-group">
            <label for="rare_id">Rarity</label>
              <select name="rare_id" class="form-control showMe">
                  <option selected value="{{ $comic->rare_id }}">@if(($comic->rare_id) != null) Rare @else Normal @endif</option>
                  <option>@if (($comic->rare_id) != null)
                      Normal @else Rare @endif</option>
              </select>
          </div>
          @if ($comic->rare_id != null)
            <div class="rare-form">
              <div class="form-group">
                <label>Copies in the world</label>
                <input class="form-control" type="text" name="circulation" value="{{ $comic->rare->circulation }}">
              </div>
              <div class="form-group">
                <label>Condition</label>
                <input class="form-control" type="number" name="condition" value="{{ $comic->rare->circulation }}">
              </div>
            </div>
          @else
            <div class="rare-form">
              <div class="form-group">
                <label>Copies in the world</label>
                <input class="form-control" type="text" name="circulation">
              </div>
              <div class="form-group">
                <label>Condition</label>
                <input class="form-control" type="number" name="condition">
              </div>
            </div>
          @endif


          <div class="form-group">
            <label>Quantity</label>
            <input class="form-control" type="integer" name="quantity" value="{{ $comic->quantity }}">
          </div>
          <div class="row mt-4 justify-content-center">
            <button class="btn btn-warning" type="submit">Update</button>
            <a href="{{ action('ComicsController@index') }}" class="btn btn-default">Back</a>
          </div>
        </form>
    </div>
    </div>
  </div>
@endsection
