<!-- modal update-->
<div class="modal fade" id="modal-update-category-{{$cat->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="{{route('admin.categories.update', $cat->id)}}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category">Nombre</label>
                        <input type="text" name="category" class="form-control" id="category" required value="{{$cat->name}}">
                    </div>
                    <div class="form-group">
                        <label for="desc">Descripción</label>
                        <input type="text" name="description" class="form-control " id="desc" required value="{{$cat->description}}">
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