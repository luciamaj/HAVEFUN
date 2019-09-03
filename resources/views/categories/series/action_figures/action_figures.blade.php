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
        <a class="nav-link active" href="/action_figures">ActionFigures</a>
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
      <a class="nav-link" href="/comics">Comics</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="/action_figures">ActionFigures</a>
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
      <a class="nav-link active" href="/action_figures">ActionFigures</a>
    </li>
  @endif
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 offset-md-1">
        <h1>Action Figures</h1>
      </div>
      <div class="col-md-4 mb-4">
        {{-- <form action="comics/search" method="GET">
          <div class="input-group"> --}}
            {{-- <input type="search" name="search_af" class="form-control">
            <span class="input-group-prepend">
              <button type="submit" class="btn btn-primary">Search</button>
            </span> --}}
            {{-- <input class="form-control" type="text" placeholder="Search" aria-label="Search"> --}}
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
          {{-- </div>
        </form> --}}
      </div>
      <div class="col-md-3 text-right">
        <a href="{{ action('ActionFiguresController@create')}}" class="btn btn-primary">Add</a>
      </div>
    </div>

    {{-- <div class="row mt-2">
      <div class="col-md-3">
        <input class="form-control" type="text" placeholder="Name">
      </div>
      <div class="col-md-3">
        <input class="form-control" type="text" placeholder="Connected Series">
      </div>
      <div class="col-md-3">
        <input class="form-control" type="number" placeholder="Material">
      </div>
      <div class="col-md-2">
        <input class="form-control" type="number" placeholder="Year">
      </div>
      <div class="col">
        <button class="btn btn-primary" type="submit">Search</button>
      </div>
      <div class="form-group col-md-2">
        <label for="connectedSeriesControlSelect">Connected Series</label>
        <select class="form-control" id="connectedSeriesControlSelect">
          <option selected>Connected Series</option>
          @foreach ($action_figures as $action_figure)
            <option>{{ $action_figure->connected_series }}</option>     mettere condizione per non ripetere i valori
          @endforeach
        </select>
      </div>
    </div> --}}

    @if (session('success'))
      <div class="col-md-6 alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ url('/delete_af') }}" method="POST">
      {!! csrf_field() !!}
    <table class="mt-4 table table-bordered table-hover">
      <thead>
        <tr>
          <td><input type="checkbox" class="checked_all"></td>
          {{-- <th scope="col">No</th> --}}
          <th scope="col">Name</th>
          <th scope="col">Connected Series</th>
          <th scope="col">Price (€)</th>
          <th scope="col">Height (cm)</th>
          <th scope="col">Material</th>
          <th scope="col">Year of Production</th>
          <th scope="col">Media</th>
          <th scope="col">Qta</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="myTable">
        @foreach ($action_figures as $action_figure)
          @if (($action_figure->deleted_at) == null)
          <tr>
            <td><input type="checkbox" class="checkbox" name="delid[]" value="{{ $action_figure->id }}"></td>
            {{-- <td>{{ $action_figure->id }}</td> --}}
            <td>{{ $action_figure->name }}</td>
            <td>{{ $action_figure->serie->name }}</td>
            <td>{{ $action_figure->price }}</td>
            <td>{{ $action_figure->height }}</td>
            <td>{{ $action_figure->material }}</td>
            <td>{{ $action_figure->year_of_production }}</td>
            <td>
              {{-- {{ $action_figure->media }} --}}
            </td>
            <td>{{ $action_figure->quantity }}</td>
            <td>
              <form action="{{ url('/delete_af') }}" method="POST">
                <a href="{{ action('ActionFiguresController@show', $action_figure->id) }}" class="btn btn-info" method="POST">Show</a>
                <a href="{{ action('ActionFiguresController@edit', $action_figure->id)}}" class="btn btn-warning" method="POST">Edit</a>
                @csrf
                {{-- @method('DELETE') --}}
                <button type="submit" class="btn btn-danger" name="delid[]" value="{{ $action_figure->id }}">Delete</button>
              </form>
            </td>
          </tr>
        @endif
        @endforeach
      </tbody>
    </table>
    <div class="row mt-4">
      <button type="submit" class="btn btn-danger ml-3">Delete selected</button>
      <a href="/softdeleted_af" class="btn btn-primary offset-md-10">Deleted</a>
    </div>
    {{-- <div class="row justify-content-center">  {{ $action_figures->links() }} </div> --}}
  </form>
  </div>
@endsection
