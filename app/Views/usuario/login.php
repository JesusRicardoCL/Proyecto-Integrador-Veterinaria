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
                                    <form class="user" id="login">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="telefono" aria-describedby="emailHelp" placeholder="Telefono" name="telefono">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="contrasena" placeholder="Contraseña" name="contrasena">
                                        </div>
                                        <a class="btn btn-primary btn-user btn-block" onClick="login2()">
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

    <script>
        function login2() {
            console.log("aaaa");
            console.log($("#telefono").val());
            console.log($("#contrasena").val());


            var url = "<?= base_url(); ?>";

            console.log(url + '/usuario/auth/' + $("#login").serialize());

            $.ajax({
                    url: url + '/usuario/auth',
                    data: {
                        "telefono": $("#telefono").val()
                    },
                    success: function(datos) { //success es una funcion que se utiliza si el servidor retorna informacion
                        console.log(datos)
                    },
                    type: "POST",
                    dataType: "json",
                });

        }

        function login() {

            var url = 'http://localhost/vet/public';

            $.ajax({
                    url: url + '/auth',
                    data: {
                        "user": $("#user").val(),
                        "password": $("#password").val(),
                        "tipo": 0
                    },
                    type: "POST",
                    dataType: "json",
                })
                .done(function(data, textStatus, jqXHR) {

                    //Se guardan los valores obtenidos en el localStorage
                    if (typeof data.error !== "string") {

                        localStorage.setItem("token", data.token);
                        localStorage.setItem("tipo", data.tipo);
                        localStorage.setItem("user", JSON.stringify(data.user));

                        location.href = "/vet/public";

                    } else {
                        alert(data.error);
                    }

                    /*
                      A partir de aqui se realizan muchas pruebas para comprobar que 
                      todo se guarde jijijija
                    */

                    // Impresion de los datos guardados
                    console.log("El token: " + localStorage.getItem("token"));
                    console.log("El tipo: " + localStorage.getItem("tipo"));
                    console.log("El user: " + localStorage.getItem("user"));

                    // Conversion del objeto guardado como json a objeto user
                    var user = JSON.parse(localStorage.getItem("user"));

                    // Impresion de los datos del objeto user
                    console.log("hola " + user.nombre + " " + user.apellidos);

                    // Redireccion de la aplicacion a otra pantalla
                    // location.href = "/gymapp";
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    console.log("La solicitud ha fallado: " + textStatus)
                })

        }
    </script>


    <!-- End of Scripts -->

</body>

</html>