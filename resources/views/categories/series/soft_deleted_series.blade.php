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
        <h1>Deleted Series</h1>
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

    <form action="{{ url('/restore_series')}}" method="GET">
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
            <tr>
              <td><input type="checkbox" class="checkbox" name="restid[]" value="{{ $serie->id }}"></td>
              <td>{{ $serie->category->category }}</td>
              <td>{{ $serie->name }}</td>
              <td>
                <form action="{{ url('restore_categories') }}">
                  @csrf
                  <button type="submit" class="btn btn-success" name="restid[]" value="{{ $serie->id }}">Restore</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row mt-4">
        <button type="submit" class="btn btn-success ml-3">Restore selected</button>
        <a href="/categories" class="btn btn-secondary offset-md-10 mr-2">Series</a>   <!-- back verso i restored o verso i diversi deleted?? -->
      </div>
    </form>
  </div>
@endsection
