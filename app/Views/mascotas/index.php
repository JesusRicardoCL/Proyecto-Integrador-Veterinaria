<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("application/views/plantilla/head.php"); ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("application/views/plantilla/sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("application/views/plantilla/topbar.php"); ?>
                <!-- End of Topbar -->
                <!-- //////////////// AQUI SE AGREGA EL CONTENIDO ///////////////////////////-->
              
                <?php if(isset($_GET["m"])){ ?>
								<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h5><i class="icon fas fa-check"></i>Notificacion!</h5>
								<?= $_GET["m"]; ?>
								</div>
					<?php } ?>

					<div class="col-12">
					<a class="btn btn-success" data-toggle="modal"  href="#nuevo"   > Nuevo</a>
					<br><br>	
					</div>

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

						

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th> 
                      <th>Colonia</th> 
                      <th>Color</th> 
                      <th>Edad</th>
                      <th>Tipo</th>
                      <th>Estado</th>
                      <th>Acciones</th>


                    </tr>
                  </thead>
                  <tbody>

									<?php foreach ($mascotas as $mascota) : ?> 
							
                    <tr>
                      <td> <?= $mascota->id; ?> </td>
                      <td> <?= $mascota->nombre ?> </td> 
                      <td> <?= $mascota->colonia ?> </td> 
                      <td> <?= $mascota->color ?> </td> 
                      <td> <?= $mascota->edad ?> </td>
                      <td> <?= $mascota->tipo ?> </td>
                      <td> <?= $mascota->estado  ?> </td>
                      <td> <a data-toggle="modal"
											        href="#nuevo"
															data-id="<?= $mascota->id ?>"
															data-nombre="<?=  $mascota->nombre ?>"
															data-colonia="<?= $mascota->colonia ?>"
															data-color="<?= $mascota->color ?>"
                              data-edad="<?= $mascota->edad ?>"
															data-tipo="<?= $mascota->tipo ?>"
															data-estado="<?= $mascota->estado ?>" 
														>Editar</a> | <a onClick="eliminar(<?= $mascota->id ?>)"  >Eliminar</a> </td>
                    </tr>

										<?php endforeach ?>
            
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        



                <!-- //////////////// AQUI SE TERMINA EL CONTENIDO ///////////////////////////-->

            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <?php include("application/views/plantilla/footer.php"); ?>
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

    <!--  modals --------------->



<!-- Modal -->
<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="nuevoTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevoTitle">Nueva mascota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
			<form id="form_nuevo" action="<?php base_url(); ?>/mascota/crear" method="POST">
						
      <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input autofocus type="text" name="nombre" class="form-control" placeholder=" ">
      </div>
      
      <div class="form-group">
                    <label for="exampleInputEmail1">Colonia</label>
                    <input autofocus type="text" name="colonia" class="form-control" placeholder=" ">
      </div>  

      <div class="form-group">
                    <label for="exampleInputEmail1">Color</label>
                    <input autofocus type="text" name="color" class="form-control" placeholder=" ">
      </div>  

      <div class="form-group">
                    <label for="exampleInputEmail1">Edad</label>
                    <input autofocus type="text" name="edad" class="form-control" placeholder=" ">
      </div>  

      <div class="form-group">
                    <label for="exampleInputEmail1">Tipo</label>
                   
										<select name="tipo" id=""  class="form-control" >
											<option value="Sin pagar"> Perro </option>
											<option value="Pagado"> Gato </option>
                      <option value="Pagado"> Conejo </option>
										</select>
      </div> 

      <div class="form-group">
                    <label for="exampleInputEmail1">Estado</label>
                   
										<select name="estado" id=""  class="form-control" >
											<option value="Adoptado"> Adoptado </option>
											<option value="No Adoptado"> No Adoptado </option>
										</select>
      </div> 
 
  
			</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="submit" form="form_nuevo" class="btn btn-success">Guardar</button>			
      </div>
    </div>
  </div>
</div>


<!-- fin modals --->

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="https://unpkg.com/blob-util/dist/blob-util.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>

    <script>



$('#nuevo').on('show.bs.modal', function (event) {
 

 var button = $(event.relatedTarget) 
 var modal = $(this)

 if(button.data('id') ){
   var id = button.data('id')
   var nombre = button.data('nombre')
   var colonia = button.data('colonia') 
   var color = button.data('color')
   var edad = button.data('edad')
   var tipo = button.data('tipo')
   var estado = button.data('estado')

 modal.find('.modal-title').text("Editar Mascota "+id )
 modal.find('.btn-success').text("Editar");
 
 modal.find('.id').val(id)   
 modal.find('input[name="nombre"]').val(nombre)
 modal.find('input[name="colonia"]').val(colonia)
 modal.find('input[name="color"]').val(color)  
 modal.find('input[name="edad"]').val(edad) 

 modal.find('.tipo').show()
 modal.find('input[name="tipo"]').val(tipo)  

 modal.find('.estado').show()
 modal.find('input[name="estado"]').val(estado)  
  

 }else{

   modal.find('.modal-title').text("Nueva Mascota")
   modal.find('.btn-success').text("Guardar");

   modal.find('.id').val("")  
   modal.find('#nombre').val("")
   modal.find('input[name="nombre"]').val("")
   modal.find('input[name="colonia"]').val("") 
   modal.find('input[name="color"]').val("")
   modal.find('input[name="edad"]').val("")
   
   modal.find('.tipo').hide()
   modal.find('selecet[name="tipo"]').find('option[value="Perro"]').attr("selected",true) 

   modal.find('.estado').hide()
   modal.find('selecet[name="estado"]').find('option[value="Adoptado"]').attr("selected",true) 

 }
})




function eliminar(id){

 Swal.fire({
 title: 'Estas seguro?',
 text: "Se eliminara para siempre!",
 icon: 'warning',
 showCancelButton: true,
 confirmButtonColor: '#3085d6',
 cancelButtonColor: '#d33',
 confirmButtonText: 'Si'
}).then((result) => {
 if (result.isConfirmed) {
   location.href="<?php base_url(); ?>/mascota/eliminar/"+id;
  /*  Swal.fire(
     'Deleted!',
     'Your file has been deleted.',
     'success'
   ) */
 }
}) 

}




</script>




</body>
</html>


