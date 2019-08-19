@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
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
          <label for="name">Nombre</label>
          <input type="text" class="form-control" name="name" value="{{ old('name', $project->name) }}">
        </div>

        <div class="form-group">
          <label for="description">Descripcion</label>
          <input type="text" class="form-control" name="description" value="{{ old('description', $project->description) }}">
        </div>

        <div class="form-group">
          <label for="start">Fecha de inicio</label>
          <input type="date" class="form-control" name="start" value="{{ old('start', $project->start) }}">
        </div>


        <div class="form-group">
          <button class="btn btn-primary">Guardar proyecto</button>
        </div>
      </form>
      <div class="row">
        <div class="col-md-6">
          <p>Categorias</p>
          <form action="/categorias" method="POST" class="form-inline">
            {{ csrf_field() }}
            <input type="hidden" name="project_id" value="{{ $project->id }}">
            <div class="form-group">
              <input type="text" name="name" placeholder="Ingrese nombre" class="form-control">
            </div>
            <button class="btn btn btn-primary">Añadir</button>
          </form>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach( $categories as $category )
                <tr>
                  <td>{{ $category->name }}</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-primary" title="Editar" data-category="{{ $category->id }}">
                      <span class="glyphicon glyphicon-pencil"> </span>
                    </button>
                    <a href="/categoria/{{ $category->id }}/eliminar" class="btn btn-sm btn-danger" title="Dar de baja">
                      <span class="glyphicon glyphicon-remove"> </span>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-6">
          <p>Niveles</p>
          <form action="/niveles" method="POST" class="form-inline">
            {{ csrf_field() }}
            <input type="hidden" name="project_id" value="{{ $project->id }}">
            <div class="form-group">
              <input type="text" name="name" placeholder="Ingrese nombre" class="form-control">
            </div>
            <button class="btn btn btn-primary">Añadir</button>
          </form>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Nivel</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach( $levels as $key => $level )
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $level->name }}</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-primary" title="Editar" data-level="{{ $level->id }}">
                      <span class="glyphicon glyphicon-pencil"> </span>
                    </button>
                    <a href="/nivel/{{ $level->id }}/eliminar" class="btn btn-sm btn-danger" title="Dar de baja">
                      <span class="glyphicon glyphicon-remove"> </span>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalEditCategory">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Editar categoria</h4>
      </div>
      <form action="/categoria/editar" method="POST">
        {{ csrf_field() }}
        <div class="modal-body">
            <input type="hidden" name="category_id" id="category_id" value="">
            <div class="form-group">
              <label for="name">Nombre de la categoria</label>
              <input type="text" class="form-control" name="name" id="category_name" value ="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="modalEditLevel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Editar nivel</h4>
      </div>
      <form action="/nivel/editar" method="POST">
        {{ csrf_field() }}
        <div class="modal-body">
            <input type="hidden" name="level_id" id="level_id" value="">
            <div class="form-group">
              <label for="name">Nombre del nivel</label>
              <input type="text" class="form-control" name="name" id="level_name" value ="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <script>
    $(function(){
      $('[data-category]').on('click', editCategoryModal);
      $('[data-level]').on('click', editLevelModal);
    });

    function editCategoryModal(){
      //id
      var category_id = $(this).data('category');
      $('#category_id').val(category_id);
      //name
      var category_name = $(this).parent().prev().text();
      $('#category_name').val(category_name);
      $('#modalEditCategory').modal('show');
    }

    function editLevelModal(){
      //id
      var level_id = $(this).data('level');
      $('#level_id').val(level_id);
      //name
      var level_name = $(this).parent().prev().text();
      $('#level_name').val(level_name);
      $('#modalEditLevel').modal('show');
    }
  </script>
@endsection
