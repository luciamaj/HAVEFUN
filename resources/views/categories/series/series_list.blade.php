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
        <a class="nav-link active" href="/series">Series</a>
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
        <a class="nav-link" href="/data_management">DeletedItems</a>
      </li>
  @elseif (auth()->user()->isAdmin == 1)
    <li class="nav-item">
      <a class="nav-link" href="/categories">Categories</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="/series">Series</a>
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
  @endif
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 offset-md-1">
        <h1>Series</h1>
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
        <a href="{{ action('SeriesController@create')}}" class="btn btn-primary">Add</a>
      </div>
    </div>
    @if (session('success'))
      <div class="col-md-6 alert alert-success">
        {{ session('success') }}
      </div>
    @endif
    <form action="{{ url('/delete_series') }}" method="POST">
      {!! csrf_field() !!}
      <table class="mt-4 table table-bordered table-hover">
        <thead>
          <tr>
            <th><input type="checkbox" class="checked_all"></th>
            <th scope="col">Category</th>
            <th scope="col">Name</th>
            <th scope="col" width="230">Action</th>
          </tr>
        </thead>
        <tbody id="myTable">
          @foreach ($series as $serie)
            {{-- @if (($category->deleted_at) == null) --}}
            {{-- <tr class="table-tr" data-url="{{ action('ComicsController@show', $comic->id) }}"> --}}
            <tr>
              <td><input type="checkbox" class="checkbox" name="deleteid[]" value="{{ $serie->id }}"></td>
              <td>{{ $serie->category->category }}</td>
              <td>{{ $serie->name }}</td>
              <td>
                <form action="{{ url('/delete_series') }}" method="POST">
                  <a href="{{ action('SeriesController@show', $serie->id) }}" class="btn btn-info" method="POST">Show</a>
                  <a href="{{ action('SeriesController@edit', $serie->id)}}" class="btn btn-warning" method="POST">Edit</a>
                  {!! csrf_field() !!}
                  <button type="submit" class="btn btn-danger" name="deleteid[]" value="{{ $serie->id }}">Delete</button>
                </form>
              </td>
            </tr>
            {{-- @endif --}}
          @endforeach
        </tbody>
      </table>
      <div class="row mt-4">
        <button type="submit" class="btn btn-danger ml-3">Delete selected</button>
        <a href="/softdeleted_series" class="btn btn-primary offset-md-10">Deleted</a>
      </div>
      {{-- <div class="row justify-content-center">  {{ $category->links() }} </div> --}}
    </form>
  </div>
@endsection
