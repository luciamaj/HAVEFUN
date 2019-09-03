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
        <h1>Deleted AF</h1>
      </div>
      <div class="col-md-4 mb-4">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
      </div>
    </div>

    @if (session('success'))
      <div class="col-md-6 alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ url('/restore_af')}}" method="GET">
      {!! csrf_field() !!}
      <table class="mt-4 table table-bordered table-hover">
        <thead>
          <tr>
            <td><input type="checkbox" class="checked_all"></td>
            {{-- <th scope="col">No</th> --}}
            <th scope="col">Name</th>
            <th scope="col">Connected Series</th>
            <th scope="col">Price</th>
            <th scope="col">Height</th>
            <th scope="col">Material</th>
            <th scope="col">Year of Production</th>
            <th scope="col">Media</th>
            <th scope="col">Qta</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody id="myTable">
          @foreach ($action_figures as $action_figure)
            <tr>
              <td><input type="checkbox" class="checkbox" name="restid[]" value="{{ $action_figure->id }}"></td>
              <td>{{ $action_figure->name }}</td>
              <td>{{ $action_figure->connected_series }}</td>
              <td>{{ $action_figure->price }}</td>
              <td>{{ $action_figure->height }}</td>
              <td>{{ $action_figure->material }}</td>
              <td>{{ $action_figure->year_of_production }}</td>
              <td>
                {{-- {{ $action_figure->media }} --}}
              </td>
              <td>{{ $action_figure->quantity }}</td>
              <td>
                <form action="{{ url('/restore_af') }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-danger" name="restid[]" value="{{ $action_figure->id }}">Restore</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row mt-4">
        <button type="submit" class="btn btn-success ml-3">Restore selected</button>
        <a href="/action_figures" class="btn btn-secondary offset-md-9 mr-2">ActionFigures</a>
      </div>
    </form>
  </div>
@endsection
