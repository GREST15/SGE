<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/Miscss.css">
    <link rel="stylesheet" href="../css/sidebar.css"> 
    <title>Gestion de Grupos</title>
</head>
<body>
<?php
        session_start();
        if($_SESSION['TipoUsuario'] == 3)
        { require '../Plantillas/Headers/HeaderAdmin.php';
            ?>

  <script src="../js/bootstrap.min.js"></script>
  <h2 align="center" style="color:whitesmoke">Grupos registrados</h2>
<!--Boton ded modal-->
  <div class="container">
    <button type="button" class="btn button bggreen" data-bs-toggle="modal" data-bs-target="#Modalgrupo">
      Añadir Nuevo Grupo
    </button>
    
  </div>
  <form action="" method="post">
<?php
include 'Scripts/DBSGE.php';
 $conexion = new Database();
 $conexion->conectarDB();
 
 $cadena = "SELECT ID_Carrera, Nombre_Carrera FROM carreras";
 $reg = $conexion->seleccionar($cadena);
echo"<div class='container'>";
 echo "<div class=mb-3>
 <label class='control-label'>
 Seleccione una carrera para ver sus grupos
 </label>
 <select name='carrera' class='form-select'>";

 foreach ($reg as $value)
 {
     echo "<option value='".$value->ID_Carrera."'>".$value->Nombre_Carrera."</option>";
 }
 echo "</select>
 </div>
 </div>";
 $conexion->desconectarDB();
?>
<div class="container"><button style="width: 100%;"  type="submit" class="btn btn button bgblue">Ver</button></div>
</form>

<?php

  if ($_POST)
  {
    extract($_POST);
    $conexion = new Database();
    $conexion->conectarDB();
    echo "$carrera";
    $consulta="SELECT ID_Grupo, carreras.Nombre_Carrera as Carrera, cuatrimestre.descripcion as Cuatrimestre, Seccion,Turno FROM grupos join cuatrimestre on grupos.Cuatrimestre = cuatrimestre.ID_Cuatrimestre join carreras on grupos.Carrera = carreras.ID_Carrera where grupos.Carrera = $carrera";

  $table=$conexion->seleccionar($consulta);
echo "<div class='container'>";
  echo "<table class='table table-hover container-lg text-center'>
  <thead>
      <tr>
          <th scope='col'>Carrera</th>
          <th scope='col'>Cuatrimestre</th>
          <th scope='col'>Seccion</th>
          <th scope='col'>Turno</th>
      </tr>
  </thead>
  <tbody>";

  foreach($table as $registro)
{
 echo "<tr>";
 echo "<td> $registro->Carrera</td>";
 echo "<td> $registro->Cuatrimestre</td>";
 echo "<td> $registro->Seccion</td>";
 echo "<td> $registro->Turno</td>";
 echo "<td><a href='AsigMaterias.php?ID=".$registro->ID_Grupo."'> <button type='button' class='btn btn-success'>
 Asignar Materias
</button></a>
<a href='Scripts/EliminarGrupo.php?ID=".$registro->ID_Grupo."'> <button type='button' class='btn btn-danger' onclick='return ConfirmDelete()'>
Eliminar
</button></a>";
 echo "</tr>";
}
echo "</tbody> </table> </div>";
$conexion->desconectarDB();
  }
 ?>
            <!-- Modal grupo -->
            <div class="modal fade" id="Modalgrupo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content bggreen">
                  <div class="modal-header">
                    <h5 class="modal-title" id="Modalexamen">Añadir grupo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body ">
              <form action="Scripts/RegGrupo.php" method="post">
                        <?php
                        /*lista select de cARRERAS*/
                        
                        $db = new Database();
                        $db->conectarDB();
                        

                        $cadena = "SELECT * FROM carreras";
                        $reg = $db->seleccionar($cadena);

                        echo "<div class=mb-3>
                        <label class='control-label'>
                        Carreras
                        </label>
                        <select name='carrera' class='form-select' required>";
                        foreach ($reg as $value)
                        {
                            echo "<option value='".$value->ID_Carrera."'>".$value->Nombre_Carrera."</option>";
                        }
                        echo "</select>
                        </div>";
                        $db->desconectarDB();
                        ?>

                    
                        <?php /*lista select de cuatrimestre*/
                        $db->conectarDB();
                        

                        $cadena = "SELECT * FROM cuatrimestre";
                        $reg = $db->seleccionar($cadena);

                        echo "<div class=mb-3>
                        <label class='control-label'>
                        Cuatrimestre
                        </label>
                        <select name='cuatri' class='form-select' required>";
                        foreach ($reg as $value)
                        {
                            echo "<option value='".$value->ID_Cuatrimestre."'>".$value->descripcion."</option>";
                        }
                        echo "</select>
                        </div>";
                        $db->desconectarDB();
                        ?>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" name="seccion" class="form-label">Seccion</label>
                      <td><select name="seccion" class='form-select' required>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">G</option>
                        <option value="G">H</option>
                        <option value="H">I</option>
                      </select>
                     </td>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Turno</label>
                      <td>
                      <select name="turno" class='form-select' required>
                        <option value="TM">TM</option>
                        <option value="TN">TN</option>
                
                      </select>  
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn button" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn button">Guardar</button>
                  </div>
                  </form>
                  
                </div>
              </div>
            </div>
   
    <!--/*JS DE CONFIRMACION*/-->
<script type="text/javascript">
function ConfirmDelete()
{
  var respuesta = confirm ("¿ESTAS SEGURO QUE DESEAS ELIMINAR EL GRUPO?")
  if (respuesta==true)
  {
    return true;
  }
  else
  {
    return false;
  }
}
</script>
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