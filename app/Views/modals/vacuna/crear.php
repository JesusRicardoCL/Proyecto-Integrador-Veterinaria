<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Vacunacion</h5>
                    <i class="fa fa-times" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer; font-size: 1.5em"></i>
                </div>
                <div class="modal-body">
                    <form id="create">
                    <div class="mb-3">
                        <label>Mascota :</label>
                        <select name="idMascota" class="form-control">
                            <option id="idMascota" value="0">Sin mascota</option>

                            <?php foreach ($mascotas as $mascota) { ?>

                                <option id="idMascota" value="<?= $mascota['id'] ?>" }><?= $mascota['nombre'] ?></option>

                            <?php  } ?>

                        </select>
                    </div> 
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Fecha de vacunacion:</label>
                            <input type="Date" class="form-control" name="fecha">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nombre de la vacuna:</label>
                            <input type="text" class="form-control" name="nombre">
                        </div>
                      
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cerrar</button>
                    <button type="submit" class="btn btn-success" onClick="crear()">Crear</button>
                </div>
            </div>
        </div>
    </div>