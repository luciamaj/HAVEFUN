@extends('layouts.app')

@section('navbar')
  <li class="nav-item">
    <a class="nav-link active" href="/permissions">Permissions</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/users_list">Users List</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/comics">Comics List</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/action_figures">AF List</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/data_management">Data Management</a>
  </li>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-4 mb-4 offset-lg-2">
      <h1>Permissions</h1>
    </div>
  </div>
  <div class="row mb-4">
    <input class="form-control col-lg-3 offset-lg-2" type="text" placeholder="Username">
    <div class="form-group col-lg-3">
      <select id="inputState" class="form-control">
        <option selected>Role...</option>
        <option>Admin</option>
        <option>Employee</option>
      </select>
    </div>
    <input class="form-control col-lg-3" type="text" placeholder="Reset Password">
  </div>
  <div class="row">
    <div class="form-check col-lg-8 offset-lg-2">
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
    <div class="form-check col-lg-8 offset-lg-2">
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
    <div class="form-check col-lg-8 offset-lg-2">
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
    <div class="form-check col-lg-8 offset-lg-2">
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
    <div class="form-check col-lg-8 offset-lg-2">
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
    <div class="form-check col-lg-8 offset-lg-2">
        <label for="toggleEsempio1a">
          <li>Possibilità di aggiungere(?) i dipendenti</li>
        </label>
    </div>
    <label class="label col-lg-2 toggle">
      <input type="checkbox" class="toggle_input" />
      <div class="toggle-control"></div>
    </label>
  </div>
  <button class="btn btn-primary offset-md-2" type="submit">SAVE</button>
</div>
{{-- <div class="container">

    <h1>Bootstrap Toggle Example</h1>

    <strong>Normal Toggle:</strong>

    <br/>

    <input checked data-toggle="toggle" data-onstyle="warning" type="checkbox">

    <br/>

    <strong>Toggle with custom text:</strong>

    <br/>

    <input checked data-toggle="toggle" data-on="Enabled" data-off="Disabled" type="checkbox">

</div> --}}
@endsection
