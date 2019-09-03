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
    <div class="row mb-4 justify-content-center">
      <h1>Edit User</h1>
    </div>
    <div class="mt-4 col-lg-6 offset-lg-3">
      @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      @foreach($users as $user)
        <form action="{{ action('UserController@update', $user->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" value="{{ $user->name }}">
          </div>
          @if (auth()->user()->isAdmin == 2)
            <div class="form-group">
              <label for="name">Username</label>
              <input class="form-control" type="text" name="username" value="{{ $user->username }}">
            </div>
          @endif
          <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" value="{{ $user->email }}">
          </div>
          @if (auth()->user()->isAdmin == 2)
            <div class="form-group">
              <label for="isAdmin">Select role</label>
                <select name="isAdmin" class="form-control">
                  @if ($user->isAdmin == 1)
                    <option value="{{ '1' }}">Admin</option>
                    <option value="{{ '0' }}">Employee</option>
                  @elseif ($user->isAdmin == 0)
                    <option value="{{ '0' }}">Employee</option>
                    <option value="{{ '1' }}">Admin</option>
                  @elseif ($user->isAdmin == 2)
                    <option value="{{ '2' }}">Super Admin</option>
                    <option value="{{ '1' }}">Admin</option>
                    <option value="{{ '0' }}">Employee</option>
                  @endif
                </select>
            </div>
          @endif

          @if (auth()->user()->isAdmin == 2)
            <div class="form-group">
              <label for="password">Reset Password</label>
              <input class="form-control" type="text" name="password">
            </div>

            <div class="row mt-4 offset-lg-1">
              <h4>Permissions</h4>
            </div>
            <div class="row mt-4">
              <div class="form-check col-lg-10">
                  <label for="toggleEsempio1a">
                    <li>Possibilità di modificare i singoli elementi</li>
                  </label>
              </div>
              <label class="label col-lg-2 toggle">
                <input type="checkbox" class="toggle_input" />
                <div class="toggle-control"></div>
              </label>
            </div>
            <div class="row">
              <div class="form-check col-lg-10">
                  <label for="toggleEsempio1a">
                    <li>Possibilità di eliminare gli elementi</li>
                  </label>
              </div>
              <label class="label col-lg-2 toggle">
                <input type="checkbox" class="toggle_input" />
                <div class="toggle-control"></div>
              </label>
            </div>
            <div class="row">
              <div class="form-check col-lg-10">
                  <label for="toggleEsempio1a">
                    <li>Possibilità di aggiungere nuovi elementi</li>
                  </label>
              </div>
              <label class="label col-lg-2 toggle">
                <input type="checkbox" class="toggle_input" />
                <div class="toggle-control"></div>
              </label>
            </div>
            <div class="row">
              <div class="form-check col-lg-10">
                  <label for="toggleEsempio1a">
                    <li>Possibilità di modificare(?) i dipendenti</li>
                  </label>
              </div>
              <label class="label col-lg-2 toggle">
                <input type="checkbox" class="toggle_input" />
                <div class="toggle-control"></div>
              </label>
            </div>
            <div class="row">
              <div class="form-check col-lg-10">
                  <label for="toggleEsempio1a">
                    <li>Possibilità di eliminare(?) i dipendenti</li>
                  </label>
              </div>
              <label class="label col-lg-2 toggle">
                <input type="checkbox" class="toggle_input" />
                <div class="toggle-control"></div>
              </label>
            </div>
            <div class="row mb-4">
              <div class="form-check col-lg-10">
                  <label for="toggleEsempio1a">
                    <li>Possibilità di aggiungere(?) i dipendenti</li>
                  </label>
              </div>
              <label class="label col-lg-2 mb-4 toggle">
                <input type="checkbox" class="toggle_input" />
                <div class="toggle-control"></div>
              </label>
            </div>
          @endif
          <div class="row mt-4 justify-content-center">
            <button class="btn btn-warning" type="submit">Update</button>
            <a href="{{ action('UserController@index') }}" class="btn btn-default">Back</a>
          </div>
        </form>
      @endforeach
    </div>
  </div>
@endsection
