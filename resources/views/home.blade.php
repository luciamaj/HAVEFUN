@extends('layouts.app')

@section('navbar')
  @if (auth()->user()->isAdmin == 1)
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
      <a class="nav-link" href="/action_figures">ActionFigures</a>
    </li>
  @endif
@endsection

{{-- @section('nav_login')
  @guest
      <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
      </li> --}}
      {{-- @if (Route::has('register'))
          <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
      @endif --}}
    {{-- @else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
  @endguest
@endsection --}}

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 offset-md-1">

        @if (auth()->user()->isAdmin == 2)
          <script>window.location.href = "/super_admin";</script>
        @else
          {{-- <div class="card-header">You're logged in {{!! auth()->user()->isAdmin == 1 ? 'Admin' : 'User'}}!</div> --}}
          <h1>You're logged in {{!! auth()->user()->isAdmin == 1 ? 'Admin' : 'Employee'}}!</h1>
        @endif

      </div>
    </div>
    <div class="row justify-content-center mt-4">
      <div class="col-md-10">
        <div class="card">
          {{-- <div class="card-header">Categories</div> --}}
          <div class="card-body">
            @if (auth()->user()->isAdmin == 1)
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
                <a href="/action_figures">Action figures</a>
              </li>
              <li>
                <a href="/users_list">Employees</a>
              </li>
            @else
              <li>
                <a href="/comics">Comics</a>
              </li>
              <li>
                <a href="/action_figures">Action figures</a>
              </li>
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
