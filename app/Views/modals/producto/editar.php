<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar producto</h5>
                    <i class="fa fa-times" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer; font-size: 1.5em"></i>
                </div>
                <div class="modal-body">
                    <form id="form_editar">
                        <input id="id_editar" type="hidden">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Descripcion:</label>
                            <input type="text" class="form-control" name="descripcion">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Cantidad:</label>
                            <input type="text" class="form-control" name="cantidad">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Precio:</label>
                            <input type="text" class="form-control" name="precio">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" onClick="editar()">Editar</button>
                </div>
            </div>
        </div>
    </div>