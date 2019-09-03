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
  @endif
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 offset-md-1">
        <h1>Deleted Users</h1>
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

    <form action="{{ url('/restore_user')}}" method="GET">
      {!! csrf_field() !!}
      <table class="mt-4 table table-bordered table-hover">
        <thead>
          <tr>
            <th><input type="checkbox" class="checked_all"></th>
            {{-- <th scope="col">No</th> --}}
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="myTable">
          @foreach ($users as $user)
            <tr>
              <td><input type="checkbox" class="checkbox" name="restid[]" value="{{ $user->id }}"></td>
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
                <form action="{{ url('restore_user') }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-success" name="restid[]" value="{{ $user->id }}">Restore</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{-- <div class="row mt-4 ml-2 mr-1">
        <button type="submit" class="btn btn-success">RESTORE SELECTED</button>
        <a href="users_list" class="btn btn-default offset-lg-10 mr-2">BACK</a>
      </div> --}}
      <div class="row mt-4">
        <button type="submit" class="btn btn-success ml-3">Restore selected</button>
        <a href="/users_list" class="btn btn-secondary offset-md-10 mr-2">Users</a>
      </div>
    </form>
  </div>
@endsection
