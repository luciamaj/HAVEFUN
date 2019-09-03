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
        <a class="nav-link active" href="/users_list">Users</a>
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
      <a class="nav-link active" href="/users_list">Employees</a>
    </li>
  @endif
@endsection

@section('content')
  @if (auth()->user()->isAdmin == 2)
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 offset-lg-1">
          <h1>Users</h1>
        </div>
        <div class="col-md-4 mb-4">
          <input class="form-control" id="myInput" type="text" placeholder="Search..">
        </div>
        <div class="col-md-3 text-right">
          <a href="{{ action('UserController@create')}}" class="btn btn-primary">Add</a>
        </div>
      </div>

      @if (session('success'))
        <div class="col-md-6 alert alert-success">
          {{ session('success') }}
        </div>
      @endif

      <form action="{{ url('/delete_users')}}" method="POST">
        {!! csrf_field() !!}
        <table class="mt-4 table table-bordered table-hover">
          <thead>
            <tr>
              <th><input type="checkbox" class="checked_all"></th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="myTable">
              @foreach ($users as $user)
              <tr>
                <td><input type="checkbox" class="checkbox" name="deleteid[]" value="{{ $user->id }}"></td>
                <td>{!! $user->name !!}</td>
                <td>{!! $user->email !!}</td>
                <td>
                  @if (($user->isAdmin)==1)
                    {{-- {!! $user->isAdmin !!} --}}
                    Admin
                  @elseif (($user->isAdmin)==0)
                    Employee
                  @else
                    Super Admin
                  @endif
                </td>
                <td>
                  <form action="{{ url('delete_users') }}" method="POST">
                    <a href="{{ action('UserController@show', $user->id) }}" class="btn btn-info" method="POST">Show</a>
                    <a href="{{ action('UserController@edit', $user->id)}}" class="btn btn-warning" method="POST">Edit</a>
                    {!! csrf_field() !!}
                    {{-- @method('DELETE') --}}
                    <button type="submit" class="btn btn-danger" name="deleteid[]" value="{{ $user->id }}">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
        <div class="row mt-4">
          <button type="submit" class="btn btn-danger ml-3">Delete selected</button>
          <a href="/softdeleted_users" class="btn btn-primary offset-md-10">Deleted</a>
        </div>
        <div class="row justify-content-center">  {{ $users->links() }} </div>
      </form>
    </div>

  @elseif (auth()->user()->isAdmin == 1)
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 offset-lg-1">
          <h1>Employees</h1>
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

      <form action="{{ url('/delete_users')}}" method="POST">
        {!! csrf_field() !!}
        <table class="mt-4 table table-bordered table-hover">
          <thead>
            <tr>
              <th><input type="checkbox" class="checked_all"></th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="myTable">

            @foreach ($users as $user)
              @if (($user->isAdmin) == 0)
                <tr>
                  <td><input type="checkbox" class="checkbox" name="deleteid[]" value="{{ $user->id }}"></td>
                  <td>{!! $user->name !!}</td>
                  <td>{!! $user->email !!}</td>
                  <td>Employee</td>
                  <td>
                    <form action="{{ url('delete_users') }}" method="POST">
                      <a href="{{ action('UserController@show', $user->id) }}" class="btn btn-info" method="POST">Show</a>
                      <a href="{{ action('UserController@edit', $user->id)}}" class="btn btn-warning" method="POST">Edit</a>
                      {!! csrf_field() !!}
                      {{-- @method('DELETE') --}}
                      <button type="submit" class="btn btn-danger" name="deleteid[]" value="{{ $user->id }}">Delete</button>
                    </form>
                  </td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
        <div class="row mt-4">
          <button type="submit" class="btn btn-danger ml-3">Delete selected</button>
          @if (auth()->user()->isAdmin == 2)
            <a href="/softdeleted_users" class="btn btn-primary offset-md-10">Deleted</a>
          @endif
        </div>
        <div class="row justify-content-center">  {{ $users->links() }} </div>
      </form>
    </div>
  @endif
@endsection
