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
        if($_SESSION['TipoUsuario'] == 3)
        { require '../Plantillas/Headers/HeaderAdmin.php';
            ?>
  
  <script src="../js/bootstrap.min.js"></script>
  <h2 align="center" style="color:whitesmoke">Gestion de carrera</h2>
          <!-- NAV BAR-->
        <div class="container">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#productos" type="button" role="tab" aria-controls="home" aria-selected="true">Carrera</button>
            </li>

            <li class="nav-item" role="presentation"><button type="button" class="btn button bggreen" data-bs-toggle="modal" data-bs-target="#ModalProducto">
                    Añadir Nueva carrera
                  </button>
                  </li>
          </div>
          <!--Contenido de registro-->

          <!--LISTADO Y REGISTRO DE carreras-->
          <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="productos" role="tabpanel" aria-labelledby="home-tab">
              <div class="container ">
              <?php
include '../Scripts/database.php';
$conexion = new Database();
$conexion->conectarDB();

$consulta="SELECT * FROM carreras";

 $table=$conexion->seleccionar($consulta);


 echo "<table class='table container-lg table-hover text-center'>
 <thead>
     <tr>
         <th scope='col'>id</th>
         <th scope='col'>Nombre Carrera</th>

     </tr>
 </thead>
 <tbody>
";
foreach($table as $registro)
{
    echo "<tr>";
    echo "<td scope='col'> $registro->ID_Carrera </td>";
    echo "<td scope='col'> $registro->Nombre_Carrera </td>";
    echo "<td scope='col'> <a href='EditCarrera.php?ID=".$registro->ID_Carrera."''><button  type='button' class='btn button bggreen'>Editar</button></a> 
    <a href='Scripts/EliminarCarrera.php?ID=".$registro->ID_Carrera."'> <button type='button' class='btn btn-danger' onclick='return ConfirmDelete()'>Eliminar</button></a>
    
    </td>";
    
    echo "</tr>";
}
echo "</tbody> </table>";
$conexion->desconectarDB();
?>
    <script type="text/javascript">
function ConfirmDelete()
{
  var respuesta = confirm ("¿ESTAS SEGURO QUE DESEAS ELIMINAR LA CARRERA? ESTO HARA QUE SE ELIMINEN SUS GRUPOS")
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
              
                   <!--REGISTRO DE Carrera-->

                  <div class="modal fade " id="ModalProducto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content bggreen">
                        <div class="modal-header">
                          <h5 class="modal-title">Añadir carrera</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body ">
                            <form action="Scripts/RegCarreras.php" method="post">
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" name="nombrep" class="form-label">Nombre de Carrera</label>
                            <input type="text" class="form-control" name="carrera" id="exampleFormControlInput1" >
                          </div>
                        
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn button" data-bs-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn button">Guardar</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
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

