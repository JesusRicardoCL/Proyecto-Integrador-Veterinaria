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
                    <h1 class="h3 mb-4 text-gray-800">Citas</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-success">Registrar una nueva cita</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Cliente <i class="far fa-address-card"></i> </th>
                                            <th>Mascota <i class="fas fa-cat"></i> </th>
                                            <th>Descripcion <i class="fas fa-cannabis"></i> </th>
                                            <th>Fecha <i class="fas fa-calendar-day"></i> </th>
                                            <th>Hora <i class="	fas fa-business-time"></i></i> </th>
                                            <th>Ubicacion <i class="fas fa-search-location"></i></th>
                                            <th>Acciones <i class="fas fa-fw fa-edit"></i></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Cliente</th>
                                            <th>Mascota</th>
                                            <th>Descripcion</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Ubicacion</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php foreach ($citas as $cita) { ?>

                                            <tr>
                                                <td> <?= $cita['id'] ?> </td>
                                                <td> <?= $cita['cliente'] ?> </td>
                                                <td> <?= $cita['mascota'] ?> </td>
                                                <td> <?= $cita['descripcion'] ?> </td>
                                                <td> <?= $cita['fecha']  ?> </td>
                                                <td> <?= $cita['hora']  ?> </td>
                                                <td> <?= $cita['ubicacion'] ?> </td>
                                                <td> <a data-bs-toggle="modal" class="btn btn-warning" data-bs-target="#editarModal" onClick="llenarForm()" data-id="<?= $cita['id'] ?>">Editar</a>
                                                    <button data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger " data-id="<?= $cita['id'] ?>">Eliminar</button>
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
    <?php echo view('modals/cita/crear'); ?>

    <!-- Modal Edit Product-->
    <?php echo view('modals/cita/editar'); ?>

    <!-- Modal Delete Product-->
    <?php echo view('modals/cita/eliminar'); ?>

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
                    url: url + '/cita/delete/' + $("#id_eliminar").val(),
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
                        text: 'La cita se elimino con exito!',
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
                    url: url + '/cita/create',
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
                            text: 'La cita se ha creado con exito!',
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
                    url: url + '/cita/show/'+ $("#id_editar").val(),
                    data: {},
                    type: "GET",
                    dataType: "json",
                    headers: {
                        token: localStorage.getItem("token")
                    }
                })
                .done(function(data, textStatus, jqXHR) {
                    var cita = data.cita;

                    console.log(data.cita);

                    $("select[name='idUsuario'] option[value='"+cita.idUsuario+"']").attr("selected","selected" );
                    $("select[name='idMascota'] option[value='"+cita.idMascota+"']").attr("selected","selected" );
                    $("input[name='descripcion']").val(cita.descripcion);
                    $("input[name='fecha']").val(cita.fecha);
                    $("input[name='hora']").val(cita.hora);
                    $("input[name='ubicacion']").val(cita.ubicacion);
                    
                });

        }

        llenarForm();

        /*
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

                    $("select[name='idUsuario'] option[value='"+mascota.idUsuario+"']").attr("selected","selected" );
                    $("select[name='idAnimal'] option[value='"+mascota.idAnimal+"']").attr("selected","selected" );
                    $("input[name='nombre']").val(mascota.nombre);
                    $("input[name='raza']").val(mascota.raza);
                    $("input[name='descripcion']").val(mascota.descripcion);
                    $("input[name='correo']").val(mascota.correo);
                    


                });

        }

        llenarForm();*/


        $('#editarModal').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)
            var id = button.data('id');
            var modal = $(this)


            $("#id_editar").val(id)

        })


        function editar() {
            console.log($("#form_editar").serialize());
            $.ajax({
                    url: url + '/cita/update/' + $("#id_editar").val(),
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
                            text: 'La cita ha sido editada con exito!',
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