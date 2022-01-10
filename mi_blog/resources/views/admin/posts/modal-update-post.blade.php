<!-- modal update-->
<div class="modal fade" id="modal-update-post-{{$post->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="{{route('admin.posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="post">Nombre</label>
                        <input type="text" name="title" class="form-control" id="post" required value="{{$post->title}}">
                    </div>
                    <div class="form-group">
                        <label for="category">Categoría</label>
                        <select class="form-control" name="category" id="category" required >
                            <option value="{{$post->category->id}}" selected>{{$post->category->name}}</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cont">Contenido</label>
                        <textarea type="text" name="content" class="form-control " id="cont" required  cols="50" rows="5">{{$post->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="featured">Cambiar imagen de portada</label>
                        <input type="file" name="featured" class="form-control " id="featured" required>
                    </div>
                    <small>Imagen actual</small>
                    <img src="{{asset($post->featured)}}" class="img-fluid img-thumbnail" alt="">
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