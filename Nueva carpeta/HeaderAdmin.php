<header>
    <!--Barra de navegacion-->
    <nav class="navbar navbar-expand-lg navbar-light text-align" >
        <div class="container-fluid navar">
            <a class="navbar-brand" href="Inicio.php"><img  src="../img/SGE/SGE.png" alt="" > </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse row text-center" id="navbarNavDropdown">
                <!--Boton de Asignatura-->
                <!--Boton de Recompensa-->
                <!--Boton de Registro de Usuarios-->
                <div class="col-6 col-md-2 offset-md-1">
                    <a href="RegistroUsuarios.php">
                        <button type="button" class="btn button" >
                            <h5>Gestion de Usuarios</h5>
                            <img id="img" src="../img/SGE/registro.png" alt="">
                        </button>
                    </a>
                </div>
                <!--Boton de Grupos-->
                <div class="col-6 col-md-2">
                    <a href="RGrupos.php">
                        <button type="button" class="btn button" >
                            <h5>Gestion de Grupos</h5>
                            <img id="img" src="../img/SGE/grupo.png" alt="">
                        </button>
                    </a>
                </div>
                <!--Boton de Canjeo-->
                <div class="col-6 col-md-2">
                    <a href="RProductos.php">
                        <button type="button" class="btn button" >
                            <h5>Gestion de Productos</h5>
                            <img id="img" src="../img/SGE/Productos.png" alt="">
                        </button>
                    </a>
                </div>
                <!--Boton de GESTIONES CARRERA Y MATERIAS-->
                <div class="dropdown col-6 col-md-2">
                    <button class="btn button" type="button" id="idconfig" data-bs-toggle="dropdown" aria-expanded="false">
                        <h5 >Otras Gestiones</h5>
                        <img id="img" src="../img/SGE/sistema-de-gestion-de-contenidos.png" alt="">
                    </button>
                    <div class="dropdown-menu bggreen container-fluid" aria-labelledby="idconfig">
                        <li><a class="dropdown-item" href="RMaterias.php">Gestion de Materias</a></li>
                        <li><a class="dropdown-item" href="RCarreras.php">Gestion de Carreras</a></li>
                        <li><a class="dropdown-item" href="R_TipoUsuario.php">Gestion de Tipos de Usuarios</a></li>
                    </div>
                </div>
                <!--Boton de notificaciones-->
                <!--Boton de configuracion-->
                <div class="dropdown col-12 col-md-2">
                    <button class="btn button" type="button" id="idconfig" data-bs-toggle="dropdown" aria-expanded="false">
                        <h5>Configuracion</h5>
                        <img id="img" src="../img/SGE/configuracion.png" alt="">
                    </button>
                    <div class="dropdown-menu bggreen container-fluid" aria-labelledby="idconfig">
                        <li><a class="dropdown-item bgwhite" href="Perfil.php">Perfil</a></li>
                        <li><a class="dropdown-item" href="#">Configuracion</a></li>
                        <li><a class="dropdown-item" href="../Scripts/cerrarSesion.php">Salir</a></li>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>