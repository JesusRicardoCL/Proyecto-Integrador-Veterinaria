<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="create">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Productos:</label>
                            <input type="text" class="form-control" name="productos">
                        </div>
                        

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Descripcion:</label>
                            <input type="text" class="form-control" name="descripcion">
                        </div>
                        
                      
                         
                         <input type="hidden" name="fecha"  value="<?php echo date("Y-m-d H:i:s ");?>">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Total:</label>
                            <input type="text" class="form-control" name="total">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" onClick="crear()">Crear</button>
                </div>
            </div>
        </div>
    </div>