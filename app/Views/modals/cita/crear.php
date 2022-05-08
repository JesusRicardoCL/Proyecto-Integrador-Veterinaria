<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar una nueva cita</h5>
                <i class="fa fa-times" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer; font-size: 1.5em"></i>
            </div>
            <div class="modal-body">
                <form id="create">
                    <div class="mb-3">
                        <label>Seleccione un cliente</label>
                        <select name="idUsuario" class="form-control">
                            <option id="idUsuario" value="0">Sin cliente</option>

                            <?php foreach ($usuarios as $usuario) { ?>

                                <option id="idUsuario" value="<?= $usuario['id'] ?>" }><?= $usuario['nombre'] ?></option>

                            <?php  } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Seleccione la mascota</label>
                        <select name="idUsuario" class="form-control">
                            <option id="idUsuario" value="0">Sin cliente</option>

                            <?php foreach ($mascotas as $mascota) { ?>

                                <option id="idMascota" value="<?= $mascota['id'] ?>" }><?= $mascota['nombre'] ?></option>

                            <?php  } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Descripción de la cita:</label>
                        <input type="text" class="form-control" name="descripcion">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Fecha de cita:</label>
                        <input type="date" class="form-control" name="fecha">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Hora de la cita:</label>
                        <input type="time" class="form-control" name="hora">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Ubicación:</label>
                        <input type="text" class="form-control" name="ubicacion">
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