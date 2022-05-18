<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('index.php'); ?>">
                <i class="fas fa-fw fa-home"></i>&nbsp;&nbsp;
                <span> Menú Principal</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('usuario/index'); ?>">
                <i class="fas fa-user"></i>&nbsp;&nbsp;
                <span> Usuarios</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('mascota/index'); ?>">
                <i class="fas fa-fw fa-dog"></i>&nbsp;&nbsp;
                <span> Mascotas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('venta/index'); ?>">
                <i class="fas fa-solid fa-prescription-bottle"></i>&nbsp;&nbsp;
                <span> Venta de productos</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('cita/index'); ?>">
                <i class="fas fa-solid fa-calendar-day"></i>&nbsp;&nbsp;
                <span> Registro de citas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('vacuna/index'); ?>">
                <i class="fas fa-solid fa-syringe"></i>&nbsp;&nbsp;
                <span> Registro de vacunas</span>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span id="nombre-usuario" class="mr-2 d-none d-lg-inline text-gray-600 small">Usuario</span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('usuario') ?>" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Cerrar Sesion
                </a>
            </div>
        </li>
    </ul>
</nav>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Selecciona "Salir" para cerrar sesión.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" onclick="signout()">Salir</a>
            </div>
        </div>
    </div>
</div>

<script>
    console.log("wat");
    if (!localStorage.getItem("user")) {
        location.href = "<?= base_url('usuario/login') ?>";
    }

    var user = JSON.parse(localStorage.getItem("user"));

    document.getElementById('nombre-usuario').innerHTML = user.nombre;



    function signout() {
        localStorage.removeItem("token");
        localStorage.removeItem("tipo");
        localStorage.removeItem("user");
        localStorage.clear();
        location.href = "<?= base_url('usuario/login') ?>";
    }
</script>