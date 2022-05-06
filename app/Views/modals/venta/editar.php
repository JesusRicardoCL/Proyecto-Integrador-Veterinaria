<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_editar">
                        <input id="id_editar" type="hidden">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Productos:</label>
                            <input type="text" class="form-control" name="productos">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Descripcion:</label>
                            <input type="text" class="form-control" name="descripcion">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">fecha:</label>
                            <input type="date" class="form-control" name="fecha">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Precio:</label>
                            <input type="text" class="form-control" name="total">
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