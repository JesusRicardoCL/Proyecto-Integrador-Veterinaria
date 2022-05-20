

<!DOCTYPE html>
<html lang="es">

<head>
    <?php echo view('plantilla/head'); ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <br>
                            <h1 class="h3 mb-4 text-gray-800">Citas</h1>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered tabla-clientes" id="tabla-clientes" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Ciudadano </th>
                                            <th>Comprobante de domicilio  </th>
                                            <th>Documento de nacionalidad  </th>
                                            <th>Modulo </th>
                                            <th>Tramite </th>
                                            <th>Fecha </th>
                                        </tr>
                                    </thead>
                                    <tbody>


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
    <?php echo view('modals/usuario/crear'); ?>

    <!-- Modal Edit Product-->
    <?php echo view('modals/usuario/editar'); ?>

    <!-- Modal Delete Product-->
    <?php echo view('modals/usuario/eliminar'); ?>

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
        var url ="https://vetpet.site/api";   


        $.ajax({    
                url: url + '/citas',
                data: {},
                type: "GET",
                dataType: "json",
            })
            .done(function(data, textStatus, jqXHR) { // lo que regresamos desde la API esta en data

                var rows=" ";
                console.log(data)

                if (!data) {
                    rows = "<h2 style='color:red; text-align:center;'>No hay registros</h2>";
                } else {
                    data.forEach(r => {
                        rows += `
               <tr>
                    <td>${r.id}</td>
                    <td>${r.Ciudadano.nombre}</td>
                    <td>${r.Comprobante.nombre}</td>
                    <td>${r.Documento.nombre}</td>
                    <td>${r.Modulo.nombre}</td>
                    <td>${r.Tramite.nombre}</td>
                    <td>${r.fecha}</td>
                </tr>
        `;
                    });
                }

                $("#tabla-clientes tbody").html(rows);

            }); //fin de llenar tabla clientes
    </script>

    <!-- End of Scripts -->

</body>

</html>