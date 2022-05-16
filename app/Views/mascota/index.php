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
                    <h1 class="h3 mb-4 text-gray-800">Mascotas</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <button data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-success">Agregar una nueva mascota</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre <i class="fas fa-user"></i> </th>
                                            <th>Raza <i class="fas fa-map-marked"></i> </th>
                                            <th>Descripción <i class="fas fa-phone-square-alt"></i> </th>
                                            <th>Animal <i class="fas fa-envelope-square"></i></i> </th>
                                            <th>Cliente <i class="fas fa-fw fa-edit"></i></th>
                                            <th>Acciones <i class="fas fa-fw fa-edit"></i></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Raza</th>
                                            <th>Descripción</th>
                                            <th>Animal</th>
                                            <th>Cliente</th>
                                            <th>Acciones</i></th>
                                        </tr>
                                    </tfoot>
                                    
                                    <tbody> 
                                    
                                        <?php foreach ($mascotas as $mascota) { ?>
                                           

                                            <tr>
                                                <td> <?= $mascota['id'] ?> </td>
                                                <td> <?= $mascota['nombre'] ?> </td>
                                                <td> <?= $mascota['raza'] ?> </td>
                                                <td> <?= $mascota['descripcion']  ?> </td>
                                                <td> <?= $mascota['animal']  ?> </td>
                                            
                                                <td> <?= $mascota['cliente']?> </td>

                                                
                                                <td> <a data-bs-toggle="modal" class="btn btn-warning" data-bs-target="#editarModal" onClick="llenarForm()" data-id="<?= $mascota['id'] ?>">Editar</a>
                                                    <button data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger " data-id="<?= $mascota['id'] ?>">Eliminar</button>
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
    <?php echo view('modals/mascota/crear'); ?>

    <!-- Modal Edit Product-->
    <?php echo view('modals/mascota/editar'); ?>

    <!-- Modal Delete Product-->
    <?php echo view('modals/mascota/eliminar'); ?>

    <!-- Scripts -->
    <?php echo view('plantilla/scripts'); ?>


    <!-- Scripts de CRUD -->
    <script>
        var url = "<?= base_url(); ?>";
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get("id");
        var idd = $("#id_editar").val(id);

        function eliminar() {

            $.ajax({
                    url: url + '/mascota/delete/' + $("#id_eliminar").val(),
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
                        text: 'La mascota se ha eliminado correctamente!',
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
                    url: url + '/mascota/create',
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
                            text: 'La mascota se ha creado correctamente!',
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
                    url: url + '/mascota/show/' + $("#id_editar").val(),
                    data: {},
                    type: "GET",
                    dataType: "json",
                    headers: {
                        token: localStorage.getItem("token")
                    }
                })
                .done(function(data, textStatus, jqXHR) {
                    var mascota = data.mascota;

                    console.log(data.mascota);

                    $("#idUsuarioEditar").val(mascota.idUsuario).change();
                    $("#idAnimalEditar").val(mascota.idAnimal).change();
                    $("#idNombre").val(mascota.nombre);
                    $("#idRaza").val(mascota.raza);
                    $("#idDescripcion").val(mascota.descripcion);
                    $("#idCorreo").val(mascota.correo);
                    


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

            console.log('aaaaaaaa');
            console.log($("#form_editar").serialize());

            $.ajax({
                    url: url + '/mascota/update/' + $("#id_editar").val(),
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
                            text: 'La mascota se ha editado correctamente!',
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