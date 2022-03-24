<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/Miscss.css">
    <title>Inicio</title>
</head>
<body>
<?php
        session_start();
        if($_SESSION['TipoUsuario'] == 2)
        {
          require '../Plantillas/Headers/HeaderAlumno.php';
            ?>

  <!--Tabla calificaciones-->
  <table class="table container-lg" >
  <thead>
                  <tr>
                      <th scope="col">Nombre de Tarea</th>
                      <th scope="col">Calificacion</th>
                      </tr>
              </thead>
              <tbody>
              <?php
                 include '../Scripts/database.php';
                $conexion = new Database();
                $conexion->conectarDB();
        
                $consulta="SELECT tareas.Nombre as tarea,calificacion FROM calif_tareas join tareas on tareas.ID_Tarea=calif_tareas.tarea where alumno = $_SESSION[matricula]";
        
                $table=$conexion->seleccionar($consulta);
         
                  foreach($table as $registro)
                         {          
                              echo "<tr>
                              <td scope='row'>$registro->tarea</th>
                              <td>$registro->calificacion</td>

                          </tr>
                         ";
                         }$conexion->desconectarDB();
                         ?>
        
              </tbody>
  </table>

    <script src="../js/bootstrap.min.js"></script>
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