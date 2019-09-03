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
        <a class="nav-link active" href="/comics">Comics</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/action_figures">ActionFigures</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/users_list">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/data_management">DeletedItems</a>
      </li>
  @elseif (auth()->user()->isAdmin == 1)
    <li class="nav-item">
      <a class="nav-link" href="/categories">Categories</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/series">Series</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="/comics">Comics</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/action_figures">ActionFigures</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/users_list">Users</a>
    </li>
  @else
    <li class="nav-item">
      <a class="nav-link active" href="/comics">Comics</a>
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
    <div class="row">
      <div class="col-md-3 offset-md-1">
        <h1>Comics</h1>
      </div>
      <div class="col-md-4 mb-4">
        {{-- <form action="comics/search" method="GET">
          <div class="input-group">
            <input type="search" name="search_comics" class="form-control">
            <span class="input-group-prepend">
              <button  href="{{ action('ComicsController@search')}}" type="submit" class="btn btn-primary">Search</button>
            </span>
          </div>
        </form> --}}
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
      </div>
      <div class="col-md-3 text-right">
        <a href="{{ action('ComicsController@create')}}" class="btn btn-primary">Add</a>
      </div>
    </div>

    {{-- <div class="row mt-2">
      <input class="form-control col-md-2 offset-md-1" type="text" placeholder="Category">
      <input class="form-control col-md-2 offset-md-1" type="text" placeholder="Series">
      <input class="form-control col-md-2 offset-md-1" type="text" placeholder="Name">
      <input class="form-control col-md-1 offset-md-1" type="number" placeholder="Exit Number">
      <div class="form-check offset-md-1 mt-3">
        <input class="form-check-input" type="checkbox" value="" id="rarityCheck">
        <label class="form-check-label" for="rarityCheck">
          Rare
        </label>
      </div>
      <div class="col mt-2">
        <button class="btn btn-primary" type="submit">Search</button>
      </div>
    </div> --}}

    @if (session('success'))
      <div class="col-md-6 alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ url('/delete_comics') }}" method="POST">
      {!! csrf_field() !!}
    <table class="mt-4 table table-bordered table-hover">
      <thead>
        <tr>
          <th><input type="checkbox" class="checked_all"></th>
          {{-- <th scope="col">No</th> --}}
          <th scope="col">Category</th>
          <th scope="col">Series</th>
          <th scope="col">Name</th>
          <th scope="col">ISBN</th>
          <th scope="col">Price (€)</th>
          <th scope="col">Exit Number</th>
          <th scope="col">Exit Date</th>
          <th scope="col">Publisher</th>
          <th scope="col">Editorial Series</th>
          <th scope="col">Rarity</th>
          <th scope="col">Copies</th>
          <th scope="col">Condition</th>
          <th scope="col">Qta</th>
          <th scope="col" width="230">Action</th>
        </tr>
      </thead>
      <tbody id="myTable">
        @foreach ($comics as $comic)
          @if (($comic->deleted_at) == null)
          {{-- <tr class="table-tr" data-url="{{ action('ComicsController@show', $comic->id) }}"> --}}
          <tr>
            <td><input type="checkbox" class="checkbox" name="deleteid[]" value="{{ $comic->id }}"></td>
            {{-- <td>{{ $comic->id }}</td> --}}
            <td>{{ $comic->serie->category->category }}</td>
            <td>{{ $comic->serie->name }}</td>
            <td>{{ $comic->name }}</td>
            <td>{{ $comic->barcode }}</td>
            <td>{{ $comic->price }}</td>
            <td>{{ $comic->exit_number }}</td>
            <td>{{ \Carbon\Carbon::parse($comic->exit_date)->format('d/m/Y') }}</td>
            <td>{{ $comic->publisher }}</td>
            <td>{{ $comic->editorial_series }}</td>
            @if ($comic->rare_id != null)
              <td>Rare</td>
              <td>{{ $comic->rare->circulation }}</td>   <!--  $comic->function della relazione->campo da stampare  -->
              <td>@if (($comic->rare->condition) == 1)
                New
              @elseif (($comic->rare->condition) == 2)
                Not new(?)
              @endif</td>
            @else
              <td>Normal</td>
              <td>---</td>
              <td>---</td>
            @endif
            <td>{{ $comic->quantity }}</td>
            <td>
              <form action="{{ url('/delete_comics') }}" method="POST">
                <a href="{{ action('ComicsController@show', $comic->id) }}" class="btn btn-info" method="POST">Show</a>
                <a href="{{ action('ComicsController@edit', $comic->id)}}" class="btn btn-warning" method="POST">Edit</a>
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-danger" name="deleteid[]" value="{{ $comic->id }}">Delete</button>
              </form>
            </td>
          </tr>
          @endif
        @endforeach
      </tbody>
    </table>
    <div class="row mt-4">
      <button type="submit" class="btn btn-danger ml-3">Delete selected</button>
      <a href="/softdeleted_comics" class="btn btn-primary offset-md-10">Deleted</a>
    </div>
    <div class="row justify-content-center">  {{ $comics->links() }} </div>
    </form>


    {{-- <form action="comics" method="POST" class="pb-5">
      <div class="input-group">
        <input type="text" name="series">
      </div>
      <button type="submit">Add Comic</button>
      @csrf
    </form> --}}

    {{-- <ul>
      @foreach ($comics as $comic)
        <li>{{ $comic }}</li>
      @endforeach
    </ul> --}}
  </div>
@endsection
