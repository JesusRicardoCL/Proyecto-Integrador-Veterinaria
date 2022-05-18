<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
                    <i class="fa fa-times" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer; font-size: 1.5em"></i>
                </div>
                <div class="modal-body">
                    <form id="form_editar">
                        <input id="id_editar" type="hidden">

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                            <input id="idNombre" type="text" class="form-control" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Domicilio:</label>
                            <input id="idDomicilio" type="text" class="form-control" name="domicilio">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Telefono:</label>
                            <input id="idTelefono" type="text" class="form-control" name="telefono">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Correo:</label>
                            <input id="idCorreo" type="text" class="form-control" name="correo">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Contraseña:</label>
                            <input id="idContrasena" type="text" class="form-control" name="contrasena">
                        </div>
                        <div class="mb-3">
                        <label>Seleccione el tipo de usuario</label>
                        <select name="tipo_usuario" class="form-control">
                            <option id="idtipo_usuario" value="">Sin Opcion</option>

                        <option id="idtipo_usuario" value="1">Cliente</option>
                        <option id="idtipo_usuario" value="2">Empleado</option>
                        <option id="idtipo_usuario" value="3">Administrador</option>


                        </select>
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