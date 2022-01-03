@extends('adminlte::page')

@section('title', 'Admin - Post')

{{--BOTON DEL MODAL --}}
@section('content_header')
<h1>
    Posts
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-post">
        Crear
    </button>
</h1>
@stop
{{-- MODAL --}}

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop



@section('content')




<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de Posts</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="posts" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Post</th>
                            <th>Contenido</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($posts as $post)
                       <tr>
                           <td>{{$post->id}}</td>
                           <td>{{$post->title}}</td>
                           <td>{{$post->content}}</td>
                           <td class="text-center">
                               <div class="row">
                                   <div class="col-6">
                                       <button class="btn btn-success btn-xs w-100"  data-toggle="modal" data-target="#modal-update-post-{{$post->id}}">Editar</button>
                                   </div>
                                   <div class="col-6">
                                        <form action="{{route('admin.posts.delete', $post->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                            <button type="submit"  class="btn btn-danger btn-xs w-100">Eliminar</button>
                                        </form>
                                    </div>

                            </td>
                        </tr>
                        @include('admin.posts.modal-update-post')
                        
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
<div class="modal fade" id="modal-create-post">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="{{route('admin.posts.store')}}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="post">Nombre</label>
                        <input type="text" name="post" class="form-control" id="post" required>
                    </div>
                    <div class="form-group">
                        <label for="cont">Contenido</label>
                        <input type="text" name="content" class="form-control " id="cont" required>
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
    $('#posts').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
    </script>
@endsection