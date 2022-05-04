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
                    <h1 class="h3 mb-4 text-gray-800">Usuarios</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-success">Agregar un nuevo usuario</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Usuario <i class="fas fa-user"></i> </th>
                                            <th>Domicilio <i class="fas fa-map-marked"></i> </th>
                                            <th>Telefono <i class="fas fa-phone-square-alt"></i> </th>
                                            <th>Correo <i class="fas fa-envelope-square"></i></i> </th>
                                            <th>Acciones <i class="fas fa-fw fa-edit"></i></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Usuario</th>
                                            <th>Domicilio</th>
                                            <th>Telefono</th>
                                            <th>Correo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php foreach ($usuarios as $usuario) { ?>

                                            <tr>
                                                <td> <?= $usuario['id'] ?> </td>
                                                <td> <?= $usuario['nombre'] ?> </td>
                                                <td> <?= $usuario['domicilio'] ?> </td>
                                                <td> <?= $usuario['telefono']  ?> </td>
                                                <td> <?= $usuario['correo']  ?> </td>
                                                <td> <a class="btn btn-warning" onclick="abrirModal(0)">Editar</a>
                                                    <button data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger " data-id="<?= $usuario['id'] ?>">Eliminar</button>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Create Product-->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="create">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Domicilio:</label>
                            <input type="text" class="form-control" name="domicilio">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Telefono:</label>
                            <input type="text" class="form-control" name="telefono">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Correo:</label>
                            <input type="text" class="form-control" name="correo">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" onClick="crear()">Crear usuario</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Product-->

    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Domicilio:</label>
                            <input type="text" class="form-control" id="domicilio">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Telefono:</label>
                            <input type="text" class="form-control" id="telefono">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Correo:</label>
                            <input type="text" class="form-control" id="correo">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success"  onClick="">Crear usuario</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete Product-->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Seguro que deseas eliminar el usuario seleccionado?
                </div>
                <input id="id_eliminar" type="hidden">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" onClick="eliminar()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <?php echo view('plantilla/scripts'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
    <script>
                
        //if(!localStorage.getItem("user")){
        //  location.href="<?= base_url('usuario/login') ?>";
        //}

        var user = JSON.parse(localStorage.getItem("user"));
     //   $(".nombre-usuario").html(user.nombre);

        function signout() {
            localStorage.removeItem("token");
            localStorage.removeItem("tipo");
            localStorage.removeItem("user");
            localStorage.clear();
            location.href = "pages/sign-in.html"
        }
        var url ="http://localhost/vet/public";

        function eliminar() {

            $.ajax({ //iniciar ajax para crar token   
                    url: url + '/usuario/delete/' +   $("#id_eliminar").val(),
                    data: {},
                    type: "POST",
                    dataType: "json",
                    headers: {
                        token: localStorage.getItem("token")
                    }
                })
                .done(function(data, textStatus, jqXHR) {

                    console.log(data);

                    location.href="?";

                 /*    Swal.fire(
                        'Eliminado!',
                        'Cliente eliminado.',
                        'success'
                    ).then(function() {
                        location.href = "?";
                    }); */


                }); //eliminar cliente ajax

        } //eliminar cliente funcion



        $('#deleteModal').on('show.bs.modal', function (event) {
           
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') ; 
  var modal = $(this)
  

  $("#id_eliminar").val(id)
  /* 
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient) */
})
function crear(){
    console.log("le di click")
    
    console.log($("#create").serialize());

     $.ajax({   //iniciar ajax para crar token   
    url: url+'/usuario/create',
    data:$("#create").serialize(),
    type: "POST",
    dataType: "json",
    headers:{
      token: localStorage.getItem("token")
    }
})
 .done(function( data, textStatus, jqXHR ) { 
  
  if(data.id != null){

    alert("Usuario "+data.nombre+" se creo correctamente!");

    location.href="?";

  }else{

    alert("Hay algo mal en el formulario ");
  }
 

 }); 

  }


    </script>

    <!-- End of Scripts -->

</body>

</html>