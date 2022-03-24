<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/Miscss.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <title>Inicio</title>
</head>
<body>

<?php
session_start();
if($_SESSION['TipoUsuario'] == 2)
{
  require '../Plantillas/Headers/HeaderAlumno.php';
  
    ?>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar-->
    
     <div class="bggreen" id="sidebar-wrapper">
        <div class="sidebar-heading bggreen">MATERIAS</div>
        <div class="list-group bggreen text-center">
        <?php
         
          include '../Scripts/database.php';
                  
          $conexion = new Database();
                  $conexion->conectarDB();

                      $consulta="SELECT ID_Grupo_Materia,materias.Nombre_Materia as Materia from grupo_materias join materias on materias.ID_Materia=grupo_materias.Materia where grupo_materias.Grupo=$_SESSION[grupo]+0";
                      $table=$conexion->seleccionar($consulta);
                      
                      foreach($table as $registro)
                      {
                           echo "<div class='col-12'>
                            <a href='./Subasignaturas.html/Materia.php?ID=$registro->ID_Grupo_Materia'><button type='button' class='btn  button' id='materia1'>
                                <h5>$registro->Materia
                                </h5>
                            </button>
                          </a>
                        <hr>
                      </div>";
        }$conexion->desconectarDB();
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
        
          <h2>CONTENIDO O INICIO AQUI IRA LO QUE SEA DE INTERES DEL ALUMNO</h2>
</div>
    
<?php
    }
    else
    {
      echo"<div class='alert alert-danger' role='alert text-center'>
      No tienes permiso para acceder a este apartado
    </div>";
    }
    ?>
<!-- Core theme JS-->
<script src="../js/sidebar.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>

