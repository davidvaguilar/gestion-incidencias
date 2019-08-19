@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
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
          <label for="category_id">Categoria</label>
          <select class="form-control" name="category_id">
            <option value="">General</option>
            @foreach( $categories as $category )
              <option value="{{ $category->id }}" @if( $incident->category_id == $category->id ) selected @endif> {{ $category->name }} </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="severidad">Severidad</label>
          <select class="form-control" name="severity">
            <option value="M" @if( $incident->severity == 'M' ) selected @endif>Menor</option>
            <option value="N" @if( $incident->severity == 'N' ) selected @endif>Normal</option>
            <option value="A" @if( $incident->severity == 'A' ) selected @endif>Alta</option>
          </select>
        </div>
        <div class="form-group">
          <label for="title">Titulo</label>
          <input type="text" class="form-control" name="title" value="{{ old('title', $incident->title) }}">
        </div>
        <div class="form-group">
          <label for="description">Descripcion</label>
          <textarea class="form-control" name="description">{{ old('description', $incident->description) }}</textarea>
        </div>
        <div class="form-group">
          <button class="btn btn-primary">Guardar cambios</button>
        </div>
      </form>

    </div>
</div>
@endsection
