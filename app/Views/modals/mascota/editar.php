<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar mascota</h5>
                <i class="fa fa-times" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer; font-size: 1.5em"></i>
            </div>
            <div class="modal-body">
                <form id="form_editar">
                    <input id="id_editar" type="hidden">
                    <div class="mb-3">
                        <label>Dueño:</label>
                        <select id="idUsuarioEditar" name="idUsuario" class="form-control">
                            <option id="opcionUsuario" value="0">Sin dueño</option>

                            <?php foreach ($usuarios as $usuario) { ?>

                                <option id="opcionUsuario" value="<?= $usuario['id'] ?>" }><?= $usuario['nombre'] ?></option>

                            <?php  } ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input id="idNombre" type="text" class="form-control" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label>Animal:</label>
                        <select id="idAnimalEditar" name="idAnimal" class="form-control" id="cliente">
                            <option id="opcionAnimal" value="0">Sin datos</option>

                            <?php foreach ($animales as $animal) { ?>

                                <option id="opcionAnimal" value="<?= $animal['id'] ?>" }><?= $animal['nombre'] ?></option>

                            <?php  } ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Raza:</label>
                        <input id="idRaza" type="text" class="form-control" name="raza">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Descripcion:</label>
                        <input id="idDescripcion" type="text" class="form-control" name="descripcion">
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