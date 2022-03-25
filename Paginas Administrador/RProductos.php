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
        if($_SESSION['TipoUsuario'] == 3)
        { require '../Plantillas/Headers/HeaderAdmin.php';
            ?>
 
<script src="../js/bootstrap.min.js"></script>
<h2 align="center" style="color:whitesmoke">Gestion de productos</h2>
          <!-- NAV BAR-->
        <div class="container">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#productos" type="button" role="tab" aria-controls="home" aria-selected="true">Productos</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#Cproductos" type="button" role="tab" aria-controls="profile" aria-selected="false">Canjeo de Productos</button>
            </li>      

            
          </div>

          <!--Contenido de registro-->

          <!--LISTADO Y REGISTRO DE PRODUCTOS-->
          <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade" id="productos" role="tabpanel" aria-labelledby="home-tab">
              <div class="container">
              <div class="container text-end">
          <button type="button" class="btn button bggreen" data-bs-toggle="modal" data-bs-target="#ModalProducto">
                      Añadir Nuevo Producto
                    </button>
                    </div>
               
                  <?php
                      include '../Scripts/database.php';
                      $conexion = new Database();
                      $conexion->conectarDB();
                      $consulta="SELECT*FROM productos";
                      
                    $table=$conexion->seleccionar($consulta);
                  echo "<div class='container'>";
                    echo "<table class='table table-hover container-lg text-center'>
                    <thead>
                        <tr>
                            <th scope='col'>ID</th>
                            <th scope='col'>Nombre Producto</th>
                            <th scope='col'>Stock</th>
                            <th scope='col'>Costo</th>
                        </tr>
                    </thead>
                    <tbody>";

                    foreach($table as $registro)
                  {
                  echo "<tr>";
                  echo "<td scope='col'> $registro->ID_Productos</td>";
                  echo "<td scope='col'> $registro->Nombre_Producto</td>";
                  echo "<td scope='col'> $registro->Stock_Producto</td>";
                  echo "<td scope='col'> $registro->Costo_Producto</td>"; 
                  
                  echo "
                  <td>
                  <a href='EditProducto.php?ID=".$registro->ID_Productos."''><button  type='button' class='btn button bggreen'>Editar</button></a>
                  <a href='Scripts/EliminarProducto.php?ID=".$registro->ID_Productos."'> <button type='button' class='btn btn-danger' onclick='return ConfirmDelete()'>Eliminar</button></a>
                  </td>";
                  echo "</tr>";
                  }
                  echo "</tbody> </table> </div>";
                  $conexion->desconectarDB(); 
                  ?>

                   <!--REGISTRO DE Productos-->
               

                  <div class="modal fade " id="ModalProducto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content bggreen">
                        <div class="modal-header">
                          <h5 class="modal-title">Añadir Producto</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body ">
                            <form action="Scripts/RegProducto.php" method="post" enctype="multipart/form-data">
                          <div class="mb-3">
                            <label for="exampleFormControlInput1"  class="form-label">Nombre de producto</label>
                            <input name="nombrep" type="text" class="form-control" id="exampleFormControlInput1" required >
                          </div>

                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Stock</label>
                            <input name="stock" type="text" class="form-control" id="exampleFormControlInput1" required >
                          </div>

                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Costo</label>
                            <input name="costo"  type="text" class="form-control" id="exampleFormControlInput1"required >
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Imagen</label>
                            <input type="file" name="imagen" required >
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
        <script type="text/javascript">
function ConfirmDelete()
{
  var respuesta = confirm ("¿ESTAS SEGURO QUE DESEAS ELIMINAR EL PRODUCTO?")
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

        <!--Canjeo Productos-->
        <div class="tab-pane fade show active" id="Cproductos" role="tabpanel" aria-labelledby="home-tab">
            <div class="container">

                <table class="table container-lg text-center" >
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Matricula Alumno</th>
                            <th scope="col">Nombre Producto</th>
                            <th scope="col">Estado</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    
                    <?php
                    
                      $conexion2 = new Database();
                      $conexion2->conectarDB();
                      $consulta2="SELECT ID_NumTransaccion,productos.Nombre_Producto as producto,FK_Matricula_Alum,Estado FROM productos_comprobante join productos on FK_ID_Productos = productos.ID_Productos";
                      $tabla=$conexion2->seleccionar($consulta2);
                   echo" <tbody>";
                   foreach($tabla as $registro)
                   {
                   echo"
                        <tr>
                            <td scope='col'> $registro->ID_NumTransaccion</td>
                            <td scope='col'> $registro->FK_Matricula_Alum</td>
                            <td scope='col'> $registro->producto</td>  
                            <td scope='col'> $registro->Estado</td>
                            <td scope='col'><a href='Scripts/Canjeo.php?producto=$registro->ID_NumTransaccion'><button type='submit' class='btn button bggreen'>Recogido</button></a></td>
                        </tr>";

                      
                      }
                      $conexion2->desconectarDB();
                        ?>
                      
                    </tbody>
                  </table>
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

