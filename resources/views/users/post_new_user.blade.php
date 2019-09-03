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
  @endif
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6 offset-md-3">
          <h1>Add New User</h1>
        </div>
        <div class="col-md-6 offset-md-3">
          <form action="{{ action('UserController@store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input class="form-control col-lg-6" type="text" name="name">
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input class="form-control col-lg-6" type="text" name="username">
            </div>
            <div class="form-group">
              <label for="name">Email</label>
              <input class="form-control col-lg-6" type="email" name="email">
            </div>
            <div class="form-group">
              <label for="isAdmin">Select role</label>
                <select name="isAdmin" class="form-control col-lg-6">
                  <option value="{{ '0' }}">Employee</option>
                  <option value="{{ '1' }}">Admin</option>
                  <option value="{{ '2' }}">Super Admin</option>
                </select>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input class="form-control col-lg-6" type="text" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="{{ action('UserController@index') }}" class="btn btn-secondary">Back</a>
          </form>
        </div>
    </div>
  </div>
@endsection
