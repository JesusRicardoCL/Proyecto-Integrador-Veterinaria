<!DOCTYPE html>
<html lang="en">

<head>

<?php echo view('plantilla/head'); ?>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">¡Bienvenido!</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Correo electronico o telefono">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Contraseña">
                                        </div>
                                        <a class="btn btn-primary btn-user btn-block" onclick="login()">
                                            Iniciar sesión
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">¿Olvidaste tu contraseña?</a>
                                    </div>
                                    <!-- <div class="text-center">
                                        <a class="small" href="register.html">Crear una cuenta</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Scripts -->
    <?php echo view('plantilla/scripts'); ?>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

    function login(){
    
      var url = 'http://localhost/vet/public';

      $.ajax({
        url: url+'/auth',
        data: {"user": $("#user").val(), 
              "password": $("#password").val(), 
              "tipo": 0},
        type: "POST",
        dataType: "json",
      })
      .done(function(data,textStatus,jqXHR){

        //Se guardan los valores obtenidos en el localStorage
        if(typeof data.error !== "string"){
        
        localStorage.setItem("token",data.token);
        localStorage.setItem("tipo",data.tipo);
        localStorage.setItem("user",JSON.stringify(data.user));

        location.href = "/vet/public";

        }else{
          alert(data.error);
        }

        /*
          A partir de aqui se realizan muchas pruebas para comprobar que 
          todo se guarde jijijija
        */

        // Impresion de los datos guardados
        console.log("El token: "+localStorage.getItem("token"));
        console.log("El tipo: "+localStorage.getItem("tipo"));
        console.log("El user: "+localStorage.getItem("user"));

        // Conversion del objeto guardado como json a objeto user
        var user = JSON.parse(localStorage.getItem("user"));

        // Impresion de los datos del objeto user
        console.log("hola "+user.nombre+" "+user.apellidos);

        // Redireccion de la aplicacion a otra pantalla
        // location.href = "/gymapp";
      })
      .fail(function(jqXHR,textStatus,errorThrown){
        console.log("La solicitud ha fallado: " + textStatus)
      })

    }


    </script>

    
    <!-- End of Scripts -->

</body>

</html>