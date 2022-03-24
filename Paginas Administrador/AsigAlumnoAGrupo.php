    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/Miscss.css">
        <link rel="stylesheet" href="../css/sidebar.css">   
        <title>Document</title>
    </head>
    <body>
    <?php
        session_start();
        if($_SESSION['TipoUsuario'] == 3)
        {
          require '../Plantillas/Headers/HeaderAdmin.php';
            ?>
     
  <script src="../js/bootstrap.min.js"></script>


        <!-- Modal materia -->
    
                <div class="container">
                  <div class="modal-header">
                    <h5 class="modal-title" id="Modalexamen">Asignar materia</h5>
                  </div>
                  <div class="modal-body ">
                            <form action="Scripts/AsignarGrupoaAlumno.php" method="post">
                              <?php
                                include 'Scripts/DBSGE.php';
                                  $conexion = new Database();
                                  $conexion->conectarDB();
                                  $cadena = "SELECT DISTINCT ID_Grupo, concat(carreras.Nombre_Carrera,' ',cuatrimestre.descripcion,' ',seccion,' ',turno) as nombre FROM grupos join cuatrimestre on grupos.Cuatrimestre=cuatrimestre.ID_Cuatrimestre join carreras on carreras.ID_Carrera=grupos.Carrera order by nombre desc";
                                  $reg = $conexion->seleccionar($cadena);
                                  $id = $_GET['ID'];
                                  echo "<div class=mb-3>
                                  <label for='exampleFormControlInput1' class='form-label'>Matricula Alumno</label>
                                  
                                  <select name='matricula' class='form-select'>";

                                  echo "<option value='$id'>$id</option>";
                                
                                  echo "</select>
                                  </div>";

                                  echo "<div class=mb-3>
                                  <label for='exampleFormControlInput1' class='form-label'>Grupo</label>
                                  
                                  <select name='grupo' class='form-select'>";

                                  foreach ($reg as $value)
                                  {
                                      echo "<option value='".$value->ID_Grupo."'>$value->nombre</option>";
                                  }
                                  echo "</select>
                                  </div>";
                                  $conexion->desconectarDB();
                                    
                                ?> 
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn button bgblue">Guardar</button>
                             </form>
                             <a href="RegistroUsuarios.php"><button class="btn btn-danger">Cancelar</button></a>
                  </div>
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
    </body>
    </html>
    
    
    