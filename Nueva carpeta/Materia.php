<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/Miscss.css">
    <link rel="stylesheet" href="../../css/sidebar.css">
    <title>Inicio</title>
</head>
<body>
<?php
        session_start();
        if($_SESSION['TipoUsuario'] == 2)
        {
            ?>
  <!--Barra de navegacion-->
    <nav class="navbar navbar-expand-lg navbar-light text-align">
    <div class="container-fluid navar">
      <a class="navbar-brand" href="../Inicio.php"><img  src="../../img/SGE/SGE.png" alt=""> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse row text-center" id="navbarNavDropdown">
        <!--Boton de configuracion-->
       <div class="col-6 col-md-2 offset-md-1">
         <a href="../Asignaturas.php">
          <button type="button" class="btn button ">
             <h5>Asignaturas <img id="img" src="../../img/SGE/libro.png" alt=""></h5> 
            </button>
          </a>
        </div>
        <!--Boton de Recompensa-->
       <div class="col-6 col-md-2">
         <a href="../Recompensa.php">
          <button type="button" class="btn button">
             <h5>Recompensa <img id="img" src="../../img/SGE//recompensa.png" alt="">
            </h5>
          </button>
        </a>
      </div>
        <!--Boton de Calificaciones-->
       <div class="col-6 col-md-2">
         <a href="../Calificaciones.php">
          <button type="button" class="btn button" >
            <h5>Calificaciones <img id="img" src="../../img/SGE/boleta-de-calificaciones.png" alt="">
            </h5>
          </button>
        </a>
      </div>
        <!--Boton de notificaciones-->
       <div class="dropdown col-6 col-md-2">
       <button class="btn button" type="button" id="idnoty" data-bs-toggle="dropdown" aria-expanded="false">
          <h5 >Notificaciones <img  id="img"src="../../img/SGE/notificaciones.png" alt=""></h5>
        </button>
        <div class="dropdown-menu bggreen container-fluid" aria-labelledby="idnoty">
          <li><a class="dropdown-item bgwhite" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </div>
      </div>
      <!--Boton de configuracion-->
      <div class="dropdown col-12 col-md-2">
        <button class="btn button" type="button" id="idconfig" data-bs-toggle="dropdown" aria-expanded="false">
          <h5 >Configuracion <img id="img" src="../../img/SGE/configuracion.png" alt=""></h5>
        </button>
        <div class="dropdown-menu bggreen container-fluid" aria-labelledby="idconfig">
          <li><a class="dropdown-item bgwhite" href="#">Perfil</a></li>
          <li><a class="dropdown-item" href="#">Configuracion</a></li>
          <li><a class="dropdown-item" href="../../Scripts/cerrarSesion.php">Salir</a></li>
        </div>
      </div>
      </div>
    </div>
  </nav>
  <script src="../../js/bootstrap.min.js"></script>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    
    <div class="bggreen" id="sidebar-wrapper">
        <div class="sidebar-heading bggreen">MATERIAS</div>
        <div class="list-group bggreen text-center">
        <?php
          $_SESSION['grupo'];
          include '../../Scripts/database.php';
                      $conexion = new Database();
                      $conexion->conectarDB();
                      $consulta="SELECT ID_Grupo_Materia,materias.Nombre_Materia as Materia from grupo_materias join materias on materias.ID_Materia=grupo_materias.Materia where grupo_materias.Grupo= $grupo";
                      $table=$conexion->seleccionar($consulta);
                      
                      foreach($table as $registro)
                      {
          echo"<div class='col-12'>
             <a href='Materia.php?ID=$registro->ID_Grupo_Materia'> <button type='button' class='btn button' id='materia1'>
               <h5>$registro->Materia
               </h5>
             </button></a>
           <hr>
         </div>";$conexion->desconectarDB();
                      }
        ?>
        </div>
    </div>
    
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bggreen">
            <div class="container-fluid">
                <button type="button" class="btn bggreen" id="sidebarToggle">
                  <h5>Menu Materias</h5>
               </button> 
               <hr>
              </div>
 
        </nav>
        <!-- Page content-->
        
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#Tareas" type="button" role="tab" aria-controls="home" aria-selected="true">Tareas</button>
          </li>
          <!-- <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#Examen" type="button" role="tab" aria-controls="profile" aria-selected="false">Examenes</button>
          </li> -->
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="Tareas" role="tabpanel" aria-labelledby="home-tab">
            <table class="table container-lg" >
              <thead>
                  <tr>
                      <th scope="col">Nombre de Tarea</th>
                      <th scope="col">Descripcion</th>
                      </tr>
              </thead>
              <tbody>
              <?php
                 
                $conexion = new Database();
                $conexion->conectarDB();
        
                $consulta="SELECT * FROM tareas where grupo = $_GET[ID]";
        
                $table=$conexion->seleccionar($consulta);
         
                  foreach($table as $registro)
                         {          
                              echo "<tr>
                              <td scope='row'>$registro->Nombre</th>
                              <td>$registro->Descripcion</td>
                              

                          </tr>
                         ";
                         }$conexion->desconectarDB();
                         ?>
        
              </tbody>
            </table>
          <!-- Button trigger modal <div class="container">
            <button type="button" class="btn button bggreen" data-bs-toggle="modal" data-bs-target="#Modaltarea">
              Añadir Nueva Tarea
            </button>
          </div>   -->
          </div>
          <div class="tab-pane fade" id="Examen" role="tabpanel" aria-labelledby="profile-tab">
            
            <table class="table container-lg" >
              <thead>
                  <tr>
                      <th scope="col">Nombre de Examen</th>
                      <th scope="col">Descripcion</th>
                  </tr>
              </thead>
              <tbody>
              <?php
                $conexion = new Database();
                $conexion->conectarDB();
        
                $consulta="SELECT * FROM examen where grupo= $_GET[ID]";
        
                $table=$conexion->seleccionar($consulta);
         
                  foreach($table as $registro)
                         {          
                              echo "<tr>
                              <td scope='row'>$registro->nombre</th>
                              <td>$registro->descripcion</td>
                          </tr>
                         ";
                         }
                         $conexion->desconectarDB();
                         ?>
              </tbody>
            </table>
        </div>

      
      </div>
<!-- Bootstrap core JS-->
<script src="../../js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="../../js/sidebar.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

    <?php
    }
    else
    {
      echo"<div class='alert alert-danger' role='alert text-center'>
      No tienes permiso para acceder a este apartado
    </div>";
    }
    ?>
</body>
</html>

