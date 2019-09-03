@extends('layouts.app')

@section('navbar')
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
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 offset-md-1">
          <h1>Dashboard</h1>
      </div>
    </div>
    <div class="row justify-content-center mt-4">
      <div class="col-md-10">
        <div class="card">
          {{-- <div class="card-header">Dashboard</div> --}}
          <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <li>
              <a href="/categories">Categories</a>
            </li>
            <li>
              <a href="/series">Series</a>
            </li>
            <li>
              <a href="/comics">Comics</a>
            </li>
            <li>
              <a href="/action_figures">Action Figures</a>
            </li>
            <li>
              <a href="/users_list">Users</a>
            </li>
            <li>
              <a href="data_management">Deleted Items</a>
            </li>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
