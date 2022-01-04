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
                    <thead >
                        <tr>
                            <th>Id</th>
                            <th>Título</th>
                            <th>Contenido</th>
                            <th>Categoría</th>
                            <th>Autor</th>
                            <th width="120px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($posts as $post)
                       <tr>
                           <td>{{$post->id}}</td>
                           <td>{{$post->title}}</td>
                           <td>{{$post->content}}</td>
                           <td>{{$post->category->name}}</td>
                           <td>{{$post->author}}</td>
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
                            <th>Título</th>
                            <th>Contenido</th>
                            <th>Categoría</th>
                            <th>Autor</th>
                            <th width="120px">Acciones</th>
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
                        <label for="post">Título</label>
                        <input type="text" name="title" class="form-control" id="post" required>
                    </div>
                    <div class="form-group">
                        <label for="cat">Categoría</label>
                        <select name="category" class="form-control" id="cat">
                            <option selected disabled>Elegir Categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cont">Contenido</label>
                        <textarea type="text" name="content" class="form-control " id="cont" required  cols="50" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="auth">Autor</label>
                        <input type="text" name="author" class="form-control " id="auth" required>
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