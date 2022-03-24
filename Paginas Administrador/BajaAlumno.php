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
    
                <div class="container container w-50">
                  <div class="modal-header">
                    <h5 class="modal-title" id="Modalexamen">Alumnos dados de baja</h5>
                  </div>
                  <a href="RegistroUsuarios.php"><button class="btn btn-danger">Regresar</button></a>
                            <form action="" method="post">
                              <?php
                                include 'Scripts/DBSGE.php';
                                  $conexion = new Database();
                                  $conexion->conectarDB();
                                  $consulta="SELECT Matricula_Alum,Nombre,Apellido_Paterno,Apellido_Materno,Fecha_Nacimiento,Telefono,Correo, estado.Estado as estado FROM alumnos join estado on estado.ID_Status= alumnos.Status where Status=2";

                                  $table=$conexion->seleccionar($consulta);
                     
                     
                                  echo "<table class ='table table-hover'
                             <thead class='table-dark'>
                             <tr>
                             <th scope='col'>Matricula</th>
                             <th scope='col'>Nombre</th>
                             <th scope='col'>Apellido Paterno</th>
                             <th scope='col'>Apellido Paterno</th>
                             <th scope='col'>Nacimiento</th>
                             <th scope='col'>Telefono</th>
                             <th scope='col'>Correo</th>
                             <th scope='col'>Status</th>
                             </tr>
                             </thead>
                             <tbody>
                             ";
                     
                             foreach($table as $registro)
                             {
                                 echo "<tr>";
                                 echo "<td scope='col'> $registro->Matricula_Alum </td>";
                                 echo "<td scope='col'> $registro->Nombre </td>";
                                 echo "<td scope='col'> $registro->Apellido_Paterno</td>";
                                 echo "<td scope='col'> $registro->Apellido_Materno</td>";
                                 echo "<td scope='col'> $registro->Fecha_Nacimiento</td>";
                                 echo "<td scope='col'> $registro->Telefono</td>";
                                 echo "<td scope='col'> $registro->Correo</td>";
                                 echo "<td scope='col'> $registro->estado</td>";
                                 echo "<td scope='col'> 
                                 <a href='EditAlumno.php?ID=".$registro->Matricula_Alum."''><button  type='button' class='btn button bggreen'>Editar</button></a>
                                 <a href='Scripts/EliminarAlumno.php?ID=".$registro->Matricula_Alum."'> <button type='button' class='btn btn-danger' onclick='return ConfirmDeleteAlum()'>Eliminar</button></a>
                                 </td>";
                                 echo "</tr>";
                             }
                             echo "</tbody> </table>";
                                ?> 
                                    </div>
                           
                             </form>
                             
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
    
    
    