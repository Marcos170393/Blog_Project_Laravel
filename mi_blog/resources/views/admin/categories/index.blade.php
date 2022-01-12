@extends('adminlte::page')

@section('title', 'Admin - Categorias')

{{--BOTON DEL MODAL --}}
@section('content_header')
<h1  id="mi-title" >
    Categorías
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-category">
        Crear
    </button>
</h1>
@stop
{{-- MODAL --}}

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script src="{{ asset('js/main.js') }}"></script>
@stop


@section('content')




<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de categorías</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="categories" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $cat)
                       <tr>
                           <td>{{$cat->id}}</td>
                           <td>{{$cat->name}}</td>
                           <td >{{$cat->description}}</td>
                           <td class="text-center">
                               <div class="row">
                                   <div class="col-6">
                                       <button class="btn btn-success btn-xs w-100"  data-toggle="modal" data-target="#modal-update-category-{{$cat->id}}">Editar</button>
                                   </div>
                                   <div class="col-6">
                                        <form action="{{route('admin.categories.delete', $cat->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                            <button type="submit"  class="btn btn-danger btn-xs w-100">Eliminar</button>
                                        </form>
                                    </div>

                            </td>
                        </tr>
                        @include('admin.categories.modal-update-category')
                        
                       @endforeach
                       
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<!-- modal -->
<div class="modal fade" id="modal-create-category">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="{{route('admin.categories.store')}}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category">Nombre</label>
                        <input type="text" name="category" class="form-control" id="category" required>
                    </div>
                    <div class="form-group">
                        <label for="desc">Descripción</label>
                        <input type="text" name="description" class="form-control " id="desc" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                </div>
            </form>
                
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@stop


@section('js')
    <script>
        $(document).ready(function() {
    $('#categories').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
    </script>
@endsection