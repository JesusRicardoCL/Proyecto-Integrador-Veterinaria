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
                    <h1 class="h3 mb-4 text-gray-800">Animales</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a class="btn btn-success" onclick="abrirModal(0)">Agregar nuevo</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre <i class="fas fa-user"></i> </th>
                                            <th>Acciones <i class="fas fa-fw fa-edit"></i></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Acciones</i></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php foreach ($animales as $animal) { ?> 
							
                                        <tr>
                                          <td> <?= $animal['id'] ?> </td>
                                          <td> <?= $animal['nombre'] ?> </td> 
                                          <td> <?= $animal['id']  ?> </td>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
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

    <!-- Scripts -->
    <?php echo view('plantilla/scripts'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <script>

    //if(!localStorage.getItem("user")){
    //  location.href="<?= base_url('usuario/login') ?>";
    //}

    var user = JSON.parse(localStorage.getItem("user"));
    $(".nombre-usuario").html(user.nombre);

    function signout(){
      localStorage.removeItem("token");
      localStorage.removeItem("tipo");
      localStorage.removeItem("user");
      localStorage.clear();
      location.href="pages/sign-in.html"
    }


  </script>
    <!-- End of Scripts -->

</body>

</html>