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
      <a class="nav-link" href="/users_list">Employees</a>
    </li>
  @endif
@endsection

@section('content')
  <div class="container-fluid">
    <div class="card col-lg-4 offset-lg-4">
      @foreach($users as $user)
        {{-- <img class="card-ing-top"> --}}
        <div class="card-body text-center">
          <div class="card-title">
            <h3>{{ $user->name }}</h3>
          </div>
          <p class="card-text">
            <br>
            <b>Username:</b> {{ $user->username }}
            <br>
            <b>Email:</b> {{ $user->email }}
            <br>
            <b>Role:</b> @if ($user->isAdmin == 1)
              Admin
            @elseif ($user->isAdmin == 0)
              Employee
            @elseif ($user->isAdmin == 2)
              Super Admin
            @endif
          </p>
          <a href="{{ action('UserController@edit', $user->id)}}" class="btn btn-warning mt-4 mr-4" method="POST">Edit</a>
          <a href="{{ action('UserController@index') }}" class="btn btn-secondary mt-4 ml-4">Back</a>
        </div>
      @endforeach
    </div>
  </div>
@endsection
