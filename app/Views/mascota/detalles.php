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
                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h1 class="h3 text-gray-800" style="font-size:60px"><?= $mascota['nombre'] ?></h1>
                            <input id="id_editar" value="<?= $mascota['id'] ?>" type="hidden" />
                        </div>
                        <div class="card-body">
                            <h1 class="h3 text-gray-800" style="font-size:40px">&nbsp;&nbsp;&nbsp;Datos de la mascota</h1>
                            <form id="form_editar">
                                <div class="col" style="margin: 20px; height: auto; width: 60%; border: 2px solid #d9d9d9; border-radius: 20px; padding: 50px; float: left; ">
                                    <p style="font-size:26px">
                                        <b><label id="labelNombre" style="word-wrap: break-word;" hidden>Nuevo nombre: </label></b>
                                        <input class="form-control" id="idNombre" name="nombre" style="font-size: 20px;" value="<?= $mascota['nombre'] ?>" hidden />
                                    </p>
                                    <p style="font-size:26px">
                                        <b><label style="word-wrap: break-word;">Dueño: </label></b>
                                        <select id="idUsuarioEditar" name="idUsuario" class="form-control" disabled>
                                            <option id="opcionUsuario" value="0">Sin dueño</option>

                                            <?php foreach ($usuarios as $usuario) { ?>

                                                <option id="opcionUsuario" value="<?= $usuario['id'] ?>" }><?= $usuario['nombre'] ?></option>

                                            <?php  } ?>

                                        </select>
                                    </p>
                                    <p style="font-size:26px">
                                        <b><label style="word-wrap: break-word;">Especie: </label></b>
                                        <select id="idAnimalEditar" name="idAnimal" class="form-control" id="cliente" disabled>
                                            <option id="opcionAnimal" value="0">Sin datos</option>

                                            <?php foreach ($animales as $animal) { ?>

                                                <option id="opcionAnimal" value="<?= $animal['id'] ?>" }><?= $animal['nombre'] ?></option>

                                            <?php  } ?>

                                        </select>
                                    </p>
                                    <p style="font-size:26px">
                                        <b><label style="word-wrap: break-word;">Raza: </label></b>
                                        <input class="form-control" id="idRaza" name="raza" style="font-size: 20px;" value="<?= $mascota['raza'] ?>" disabled />
                                    </p>
                                    <p style="font-size:26px">
                                        <b><label style="word-wrap: break-word;">Descripción: </label></b>
                                        <input class="form-control" id="idDescripcion" name="descripcion" style="font-size: 20px;" value="<?= $mascota['descripcion'] ?>" disabled />
                                    </p>
                                </div>
                            </form>
                            <div class="col" style="margin: 20px; height: auto; width: 30%; border-radius: 20px; padding: 0px; float: left;">
                                <hr style="border:none" />
                                <label id="editar" class="input-check" style="width:100%">
                                    <input onchange="change_state(this)" type="checkbox" value="something" name="test" />
                                    Editar
                                </label>
                                <hr style="border:none" />
                                <button data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger " style="width: 100%;" data-id="<?= $mascota['id'] ?>">Eliminar</button>
                                <hr>
                                <button data-bs-toggle="modal" data-bs-target="#createVacunaModal" class="btn btn-primary" style="width: 100%">Agregar vacuna</button>
                                <hr style="border:none" />

                            </div>
                            <div class="col" style=" height: auto; width: 96%; float: left; ">
                                <br />
                                <h1 class="h3 text-gray-800" style="font-size:40px">&nbsp;&nbsp;&nbsp;Vacunas</h1>
                            </div>

                            <div class="col" style="margin: 20px; height: auto; width: 96%; border: 2px solid #d9d9d9; border-radius: 20px; padding: 50px; float: left; ">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Fecha de aplicacion</th>
                                                <th>Vacuna aplicada</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Fecha de aplicacion</th>
                                                <th>Vacuna aplicada</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </tfoot>
                                        <label><?= $vacunas ?></label>
                                        <tbody>



                                            <?php foreach ($vacunas as $vacuna) { ?>

                                                <tr>
                                                    <td><?= $vacuna['fecha'] ?></td>
                                                    <td><?= $vacuna['nombre'] ?></td>
                                                    <td>
                                                        <a data-bs-toggle="modal" class="btn btn-warning" data-bs-target="#editarVacunaModal" onClick="llenarVacunaForm()" data-id="<?= $vacuna['id'] ?>">Editar</a>
                                                        <button data-bs-toggle="modal" data-bs-target="#deleteVacunaModal" class="btn btn-danger " data-id="<?= $vacuna['id'] ?>">Eliminar</button>
                                                    </td>
                                                </tr>

                                            <?php  } ?>


                                        </tbody>
                                    </table>
                                </div>
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



    <!-- Modal Delete Product-->
    <?php echo view('modals/mascota/eliminar'); ?>

    <!-- Modal Create Vacuna-->
    <?php echo view('modals/mascota/crearVacuna'); ?>

    <!-- Modal Update Vacuna-->
    <?php echo view('modals/mascota/editarVacuna'); ?>

    <!-- Modal Delete Vacuna-->
    <?php echo view('modals/mascota/eliminarVacuna'); ?>

    <!-- Scripts -->
    <?php echo view('plantilla/scripts'); ?>

    <!-- Scripts para esta pagina -->
    <script>
        var url = "<?= base_url(); ?>";

        //Llenas los dos select
        function llenarForm() {

            $("#idUsuarioEditar").val(<?= $mascota['idUsuario'] ?>).change();
            $("#idAnimalEditar").val(<?= $mascota['idAnimal'] ?>).change();

        }

        llenarForm();

        //Las funciones del boton de editar
        function change_state(obj) {
            var idMascota = $("#idMascota").val();
            var idCliente = $("#cliente").val();
            var idAnimal = $("#animal").val();
            var nombre = $("#formNombre").val();
            var raza = $("#formRaza").val();
            var descripcion = $("#formDescripcion").val();

            if (obj.checked) {
                //if checkbox is being checked, add a "checked" class
                obj.parentNode.classList.add("checked");

                //Reemplaza el texto del boton Editar por Guardar
                $("#editar").contents().filter(function() {
                    return this.nodeType === 3 && this.textContent.trim().length;
                }).replaceWith('Guardar');

                //Muestra el label y el input del nombre de la mascota ocultos
                document.getElementById("labelNombre").hidden = false;
                document.getElementById("idNombre").hidden = false;

                //Habilita los inputs
                document.getElementById("idUsuarioEditar").disabled = false;
                //document.getElementById("usuario").style.backgroundColor = "#4d4d4d";

                document.getElementById("idAnimalEditar").disabled = false;
                //document.getElementById("animal").style.backgroundColor = "#4d4d4d";

                document.getElementById("idRaza").disabled = false;
                //document.getElementById("formRaza").style.backgroundColor = "#4d4d4d";

                document.getElementById("idDescripcion").disabled = false;
                //document.getElementById("formDescripcion").style.backgroundColor = "#4d4d4d";
            } else {
                //else remove it
                obj.parentNode.classList.remove("checked");

                $.ajax({
                    url: url + '/mascota/update/' + $("#id_editar").val(),
                    type: "POST",
                    data: {
                        nombre: $("#idNombre").val(),
                        idMascota: <?= $mascota['id'] ?>,
                        idAnimal: $("#idAnimalEditar option:selected").val(),
                        raza: $("#idRaza").val(),
                        idUsuario: $("#idUsuarioEditar option:selected").val(),
                        descripcion: $("#idDescripcion").val(),
                    },
                    success: function(data) {
                        if (data) {
                            location.reload();
                        } else {
                            alert('Ocurrió un error al guardar el registro de Mascota');
                        }
                    }
                });
            }
        }

        //Eliminar la mascota
        function eliminar() {

            $.ajax({
                    url: url + '/mascota/delete/' + $("#id_editar").val(),
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
                        location.href = url + '/mascota/index';
                    });


                });

        }

        $('#deleteModal').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)
            var id = button.data('id');
            var modal = $(this)

            $("#id_eliminar").val(id)

        })


        function crearVacuna() {

            $.ajax({
                    url: url + '/vacuna/create',
                    data: $("#create").serialize() + "&idMascota=" + <?= $mascota['id'] ?>,
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

        //Para rellenar el modal de editar
        function llenarVacunaForm() {
            $.ajax({
                    url: url + '/vacuna/show/' + $("#id_editarVacuna").val(),
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
                    $("select[name='idMascota'] option[value='" + vacuna.idMascota + "']").attr("selected", "selected");
                    //  $("#idtipo_usuario").val(usuario.tipo_usuario);
                });

        }

        llenarVacunaForm();

        $('#editarVacunaModal').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)
            var id = button.data('id');
            var modal = $(this)


            $("#id_editarVacuna").val(id)

        })

        function editarVacuna() {
            console.log($("#form_editarVacuna").serialize());
            $.ajax({
                    url: url + '/vacuna/update/' + $("#id_editarVacuna").val(),
                    data: $("#form_editarVacuna").serialize(),
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

        function eliminarVacuna() {

            $.ajax({
                    url: url + '/vacuna/delete/' + $("#id_eliminarVacuna").val(),
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

        $('#deleteVacunaModal').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)
            var id = button.data('id');
            var modal = $(this)

            $("#id_eliminarVacuna").val(id)

        })
    </script>