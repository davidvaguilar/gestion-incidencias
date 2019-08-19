@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
      @if( session('notification') )
        <div class="alert alert-success">
          {{ session('notification') }}
        </div>
      @endif
      @if( count($errors) > 0 )
        <div class="alert alert-danger">
          <ul>
            @foreach( $errors->all() as $error )
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form method="POST" action="">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="text" class="form-control" name="password" value="{{ old('password', str_random(8)) }}">
        </div>

        <div class="form-group">
          <button class="btn btn-primary">Registrar usuario</button>
        </div>
      </form>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>E-mail</th>
            <th>Nombre</th>
            <th>Opciones</th>
          </tr>

        </thead>
        <tbody>
          @foreach( $users as $user )
            <tr>
              <td>{{ $user->email }}</td>
              <td>{{ $user->name }}</td>
              <td>
                <a href="/usuario/{{ $user->id }}" class="btn btn-sm btn-primary" title="Editar">
                  <span class="glyphicon glyphicon-pencil"> </span>
                </a>
                <a href="/usuario/{{ $user->id }}/eliminar" class="btn btn-sm btn-danger" title="Dar de baja">
                  <span class="glyphicon glyphicon-remove"> </span>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection
