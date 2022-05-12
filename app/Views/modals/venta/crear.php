<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create">
                    <div class="mb-3">
                        <label>Cliente:</label>
                        <select name="idUsuario" class="form-control">

                            <?php foreach ($usuarios as $usuario) { ?>

                                <option id="idUsuario" value="<?= $usuario['id'] ?>" }><?= $usuario['nombre'] ?></option>

                            <?php  } ?>

                        </select>
                    </div>



                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Descripcion:</label>
                        <input type="text" class="form-control" name="descripcion">
                    </div>



                    <input type="hidden" name="fecha" value="<?php echo date("Y-m-d H:i:s "); ?>">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Total:</label>
                        <input type="text" class="form-control" name="total">
                    </div>
                </form>
                <form id="addCart">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Producto:</label>
                        <div class="container" style="padding:0px; min-width:100%; align-items:center; display:flex;">
                            <select name="idProducto" id="idProducto" class="form-control" style="width: 50%;" onchange="actualizarCantidad()">
                                <option value="0">Seleccione un producto...</option>

                                <?php foreach ($productos as $producto) { ?>


                                    <option id="idOpcionProducto" value="<?= $producto['id'] ?>" }><?= $producto['nombre'] ?></option>


                                <?php  } ?>

                            </select>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" min="0" max="0" value="0" style="width: 15%; margin:10px;" onkeyup="validationFunction()">
                            <input type="number" class="form-control" id="precio" name="precio" min="0" max="9999" value="0" style="width: 15%; margin-right:10px;">
                            <button type="button" class="btn btn-primary" style="width: 20%;" onclick="agregarCarrito()">Agregar</button>
                        </div>
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

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>


<script>
    var cantidadMaxima = 0;

    function actualizarCantidad() {

        document.getElementById('idProducto').remove(0);

        $.ajax({
                url: url + '/producto/show/' + $("#idProducto").val(),
                data: {},
                type: "GET",
                dataType: "json",
                headers: {
                    token: localStorage.getItem("token")
                }
            })
            .done(function(data, textStatus, jqXHR) {
                var producto = data.producto;

                console.log(data.producto);

                document.getElementById('cantidad').max = producto.cantidad;
                document.getElementById('precio').value = producto.precio;

                cantidadMaxima = producto.cantidad;
            });

    }

    function agregarCarrito() {

        $.ajax({

                url: url + '/venta/add_cart',
                data: $("#addCart").serialize()+"&nombre="+$("#idProducto option:selected").text(), 
                type: "POST",
                dataType: "json",
                headers: {
                    token: localStorage.getItem("token")
                }
            })
            .done(function(data, textStatus, jqXHR) {

                //console.log(data);

                if (data.id != null) {

                    Swal.fire({
                        title: 'Éxito!',
                        text: 'Anadido al carro correctamente!',
                    }).then(function() {
                        location.reload();
                    });

                } else {

                    alert("Hay algo mal en el formulario ");
                }
            });
    }

    function validationFunction() {
        console.log("---------")


        var current = parseFloat(document.getElementById('cantidad').value);
        var max = parseFloat(cantidadMaxima);

        console.log(current);
        console.log(max);

        if (current > max) {
            console.log("ENTRADO X2")
            document.getElementById('cantidad').value = cantidadMaxima;
        }
    }
</script>