<!DOCTYPE html>
<html lang="es">

<head>
    <?php echo view('plantilla/head'); ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php echo view('plantilla/sidebar'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php echo view('plantilla/topbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Productos</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-success">Agregar un nuevo producto</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre <i class="fas fa-user"></i> </th>
                                            <th>Descripcion <i class="fas fa-map-marked"></i> </th>
                                            <th>Cantidad <i class="fas fa-phone-square-alt"></i> </th>
                                            <th>Precio <i class="fas fa-envelope-square"></i></i> </th>
                                            <th>Acciones <i class="fas fa-fw fa-edit"></i></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php foreach ($productos as $producto) { ?>

                                            <tr>
                                                <td> <?= $producto['id'] ?> </td>
                                                <td> <?= $producto['nombre'] ?> </td>
                                                <td> <?= $producto['descripcion'] ?> </td>
                                                <td> <?= $producto['cantidad']  ?> </td>
                                                <td> <?= $producto['precio']  ?> </td>
                                                <td> <a data-bs-toggle="modal" class="btn btn-warning" data-bs-target="#editarModal" onClick="llenarForm()" data-id="<?= $producto['id'] ?>">Editar</a>
                                                    <button data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger " data-id="<?= $producto['id'] ?>">Eliminar</button>
                                                </td>
                                            </tr>

                                        <?php  } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="modal_info" class="modal fade"></div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php echo view('plantilla/footer'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <!-- ESTO ES PARA EL CERRAR SESION PERO EL INICIO DE SESION NO SIRVE XD-->
    <?php echo view('modals/usuario/logout'); ?>

    <!-- Modal Create Product-->
    <?php echo view('modals/producto/crear'); ?>

    <!-- Modal Edit Product-->
    <?php echo view('modals/producto/editar'); ?>

    <!-- Modal Delete Product-->
    <?php echo view('modals/producto/eliminar'); ?>

    <!-- Scripts -->
    <?php echo view('plantilla/scripts'); ?>

    <!-- Script para comprobar que haya un usuario con sesion iniciada -->
    <!-- NO FUNCIONA -->
    <script>
        //if(!localStorage.getItem("user")){
        //  location.href="<?= base_url('producto/login') ?>";
        //}

        var user = JSON.parse(localStorage.getItem("user"));
        //   $(".nombre-producto").html(user.nombre);

        function signout() {
            localStorage.removeItem("token");
            localStorage.removeItem("tipo");
            localStorage.removeItem("user");
            localStorage.clear();
            location.href = "pages/sign-in.html"
        }
    </script>

    <!-- Scripts de CRUD -->
    <script>
        var url = "<?= base_url(); ?>";
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get("id");
        var idd = $("#id_editar").val(id);

        function eliminar() {

            $.ajax({
                    url: url + '/producto/delete/' + $("#id_eliminar").val(),
                    data: {},
                    type: "POST",
                    dataType: "json",
                    headers: {
                        token: localStorage.getItem("token")
                    }
                })
                .done(function(data, textStatus, jqXHR) {

                    console.log(data);

                    Swal.fire({
                        title: 'Éxito!',
                        text: 'El cliente se ha eliminado correctamente!',
                        type: 'sucess'
                    }).then(function() {
                        location.reload();
                    });


                });

        }

        $('#deleteModal').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)
            var id = button.data('id');
            var modal = $(this)

            $("#id_eliminar").val(id)

        })


        function crear() {

            $.ajax({
                    url: url + '/producto/create',
                    data: $("#create").serialize(),
                    type: "POST",
                    dataType: "json",
                    headers: {
                        token: localStorage.getItem("token")
                    }
                })
                .done(function(data, textStatus, jqXHR) {

                    if (data.id != null) {

                        Swal.fire({
                            title: 'Éxito!',
                            text: 'El cliente se ha creado correctamente!',
                        }).then(function() {
                            location.reload();
                        });

                    } else {

                        alert("Hay algo mal en el formulario ");
                    }
                });

        }

        function llenarForm() {
            $.ajax({
                    url: url + '/producto/show/' + $("#id_editar").val(),
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

                    $("input[name='nombre']").val(producto.nombre);
                    $("input[name='domicilio']").val(producto.domicilio);
                    $("input[name='telefono']").val(producto.telefono);
                    $("input[name='correo']").val(producto.correo);
                });

        }

        llenarForm();

        $('#editarModal').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)
            var id = button.data('id');
            var modal = $(this)


            $("#id_editar").val(id)

        })


        function editar() {
            console.log($("#form_editar").serialize());
            $.ajax({
                    url: url + '/producto/update/' + $("#id_editar").val(),
                    data: $("#form_editar").serialize(),
                    type: "POST",
                    dataType: "json",
                    headers: {
                        token: localStorage.getItem("token")
                    }
                })
                .done(function(data, textStatus, jqXHR) {

                    if (data.data.id !== null) {
                        Swal.fire({
                            title: 'Éxito!',
                            text: 'El cliente se ha editado correctamente!',
                        }).then(function() {
                            location.reload();
                        });
                    } else {
                        alert("Hay algo mal en el formulario ");
                    }

                });

        }
    </script>

    <!-- End of Scripts -->

</body>

</html>