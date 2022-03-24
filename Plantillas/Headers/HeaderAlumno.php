<!--Barra de navegacion-->
<nav class="navbar navbar-expand-lg navbar-light text-align">
    <div class="container-fluid navar">
      <a class="navbar-brand" href="./Inicio.php"><img  src="../img/SGE/SGE.png" alt=""> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse row text-center" id="navbarNavDropdown">
        <!--Boton de configuracion-->
       <div class="col-6 col-md-3">
         <a href="./Asignaturas.php">
          <button type="button" class="btn button ">
             <h5>Asignaturas <img id="img" src="../img/SGE/libro.png" alt=""></h5> 
            </button>
          </a>
        </div>
        <!--Boton de Recompensa-->
       <div class="col-6 col-md-3">
         <a href="./Recompensa.php">
          <button type="button" class="btn button">
             <h5>Recompensa <img id="img" src="../img/SGE//recompensa.png" alt="">
            </h5>
          </button>
        </a>
      </div>
        <!--Boton de Calificaciones-->
       <div class="col-6 col-md-3">
         <a href="./Calificaciones.php">
          <button type="button" class="btn button" >
            <h5>Calificaciones <img id="img" src="../img/SGE/boleta-de-calificaciones.png" alt="">
            </h5>
          </button>
        </a>
      </div>
        <!--Boton de notificaciones-->
       <!-- <div class="dropdown col-6 col-md-2">
       <button class="btn button" type="button" id="idnoty" data-bs-toggle="dropdown" aria-expanded="false">
          <h5 >Notificaciones <img  id="img"src="../img/SGE/notificaciones.png" alt=""></h5>
        </button>
        <div class="dropdown-menu bggreen container-fluid" aria-labelledby="idnoty">
          <li><a class="dropdown-item bgwhite" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </div>
      </div> -->
      <!--Boton de configuracion-->
      <div class="dropdown col-6 col-md-3">
        <button class="btn button" type="button" id="idconfig" data-bs-toggle="dropdown" aria-expanded="false">
          <h5 >Configuracion <img id="img" src="../img/SGE/configuracion.png" alt=""></h5>
        </button>
        <div class="dropdown-menu bggreen container-fluid" aria-labelledby="idconfig">
          <!-- <li><a class="dropdown-item bgwhite" href="#">Perfil</a></li>
          <li><a class="dropdown-item" href="#">Configuracion</a></li> -->
          <li><a class="dropdown-item" href="../Scripts/cerrarSesion.php">Salir</a></li>
        </div>
      </div>
      </div>
    </div>
  </nav>