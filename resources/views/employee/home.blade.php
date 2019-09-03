@extends('layouts.app')

@section('navbar')
  <li class="nav-item">
    <a class="nav-link" href="/comics">Comics</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/action_figures">Action Figures</a>
  </li>
  @if (auth()->user()->isAdmin == 1)
    <li class="nav-item">
      <a class="nav-link" href="/users_list">Users List</a>
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard - {!! auth()->user()->isAdmin == 1 ? 'Admin' : 'User'!!}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                          @if (($user->isAdmin)==0)
                            <tr>
                              <td>{!! $user->name !!}</td>
                              <td>{!! $user->email !!}</td>
                            </tr>
                          @endif

                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
