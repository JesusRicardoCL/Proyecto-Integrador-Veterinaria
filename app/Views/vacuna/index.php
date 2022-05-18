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
                    <h1 class="h3 mb-4 text-gray-800">Vacunas</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-success">Agregar Vacunacion</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Mascota <i class="fas fa-dog"></i> </th>
                                            <th>Fecha <i class="fas fa-calendar-alt"></i> </th>
                                            <th>Nombre <i class="fas fa-text-height"></i> </th>
                                            <th>Acciones <i class="fas fa-fw fa-edit"></i></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Mascota</th>
                                            <th>Fecha</th>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php foreach ($vacunas as $vacuna) { ?>

                                            <tr>
                                                <td> <?= $vacuna['id'] ?> </td>
                                                <td> <?= $vacuna['mascota'] ?> </td>
                                                <td> <?= $vacuna['fecha'] ?> </td>
                                                <td> <?= $vacuna['nombre']  ?> </td>
                                                <td> <a data-bs-toggle="modal" class="btn btn-success" data-bs-target="#editarModal" onClick="llenarForm()" data-id="<?= $vacuna['id'] ?>">Editar</a>
                                                    <button data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger " data-id="<?= $vacuna['id'] ?>">Eliminar</button>
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
    <?php echo view('modals/vacuna/crear'); ?>

    <!-- Modal Edit Product-->
    <?php echo view('modals/vacuna/editar'); ?>

    <!-- Modal Delete Product-->
    <?php echo view('modals/vacuna/eliminar'); ?>

    <!-- Scripts -->
    <?php echo view('plantilla/scripts'); ?>


    <!-- Script de prueba 
    sirve ocultarle cosas a los que no son admins aunque aun asi se pueden ver al inspeccionar la pagina-->
    <script>
/*
        if(localStorage.getItem("tipo")!="administrador"){
            console.log("entro");
            elementos = document.getElementsByClassName('table_password');

            for (elemento of elementos){
                elemento.style.display = 'none';
            }
        }
*/
    </script>


    <!-- Scripts de CRUD -->
    <script>
        var url = "<?= base_url(); ?>";
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get("id");
        var idd = $("#id_editar").val(id);

        function eliminar() {

            $.ajax({
                    url: url + '/vacuna/delete/' + $("#id_eliminar").val(),
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
                        text: 'La vacuna se ha eliminado correctamente!',
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
                    url: url + '/vacuna/create',
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
                            text: 'la vacuna se ha creado correctamente!',
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
                    url: url + '/vacuna/show/' + $("#id_editar").val(),
                    data: {},
                    type: "GET",
                    dataType: "json",
                    headers: {
                        token: localStorage.getItem("token")
                    }
                })
                .done(function(data, textStatus, jqXHR) {
                    var vacuna = data.vacuna;

                    console.log(data.vacuna);

                    $("input[name='fecha']").val(vacuna.fecha);
                    $("input[name='nombre']").val(vacuna.nombre);
                    $("select[name='idMascota'] option[value='"+vacuna.idMascota+"']").attr("selected","selected" );
                  //  $("#idtipo_usuario").val(usuario.tipo_usuario);
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
                    url: url + '/vacuna/update/' + $("#id_editar").val(),
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
                            text: 'La vacuna se ha editado correctamente!',
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