<!DOCTYPE html>
<html lang="en">

<head>

    <?php echo view('plantilla/head'); ?>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">¡Bienvenido!</h1>
                                    </div>
                                    <form class="user" id="login">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="telefono" aria-describedby="emailHelp" placeholder="Telefono">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="contrasena" placeholder="Contraseña">
                                        </div>
                                        <a class="btn btn-primary btn-user btn-block" onClick="login()">
                                            Iniciar sesión
                                        </a>
                                    </form>
                                    <hr>
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
        var url = "<?= base_url(); ?>";

        function login() { //inicio login al dar clic al boton

            $.ajax({ //iniciar ajax para crar token   
                    url: url + '/auth',
                    data: {
                        "user": $("#telefono").val(),
                        "password": $("#contrasena").val(),
                        "tipo": "usuario"
                    },
                    type: "POST",
                    dataType: "json",
                })
                .done(function(data, textStatus, jqXHR) { // lo que regresamos desde la API esta en data

                    console.log("hola le di clic al boton")
                    console.log(data)

                    if (typeof data.error !== "string") {
                        localStorage.setItem("token", data.token);
                        localStorage.setItem("tipo", data.tipo);
                        localStorage.setItem("user", JSON.stringify(data.user));
                        console.log("encontro usuario");
                        location.href = "/index.php";

                    } else {

                        alert(data.error);

                    }


                })
                .fail(function(jqXHR, textStatus, errorThrown) { // si hay algun error, esta en textStatus

                    console.log("La solicitud a fallado: " + textStatus + errorThrown);

                })
        } // termina function login
    </script>


    <!-- End of Scripts -->

</body>

</html>