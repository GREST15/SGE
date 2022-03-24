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
          include '../Scripts/database.php';
            ?>
  
<!--Menu-->
<script src="js/bootstrap.js"></script>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Productos</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Productos canjeados</button>
  </li>
  <div class="container">
  <div class="text-end">
    <?php 
    $conexion = new Database();
    $conexion->conectarDB();
    $consulta="SELECT Puntos_Alumno from alumnos where Matricula_Alum =$_SESSION[matricula]";
    
    $table=$conexion->seleccionar($consulta);

                  
                    foreach($table as $registro)
                    {
                      echo"<h2>Tus puntos: $registro->Puntos_Alumno</h2></div>";
                      $puntos=$registro->Puntos_Alumno;
                    }
         
         ?>
         </div>
</ul>

 <!--Productos-->
 
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <form action="">
  <?php
                     
                     
                      $conexion = new Database();
                      $conexion->conectarDB();
                      $consulta="SELECT*FROM productos";
                      
                    $table=$conexion->seleccionar($consulta);

                    echo "<div class='row row-cols-1 row-cols-md-2 g-4 py-3'>";
                  
                    foreach($table as $registro)
                  {
                    echo  "<div class='col-6 col-md-4 text-center'>";
                    
                    echo "<div class='card bggreen'>
                      <img src='../Paginas Administrador/Scripts/$registro->imagen' class='card-img-top' alt='...'>
                      <div class='card-body'>
                        <h5 class='card-title'>$registro->Nombre_Producto</h5>
                        <h5 class='card-title'>$registro->Costo_Producto puntos </h5>
                        <h5 class='card-title'>Stock: $registro->Stock_Producto</h5>
                        <a href='Scripts/Canejo.php?producto=$registro->ID_Productos&costo=$registro->Costo_Producto&alumno=$_SESSION[matricula]&puntos=$puntos&stock=$registro->Stock_Producto'> <button type='button' class='btn btn-success' onclick='return ConfirmDelete()'>Canjear</button></a>
                      </div>
                    </div>
                  
                </div>";}
                 
                  $conexion->desconectarDB(); 
                  ?>
   </form>
  </div>
</div>
 
   <!--Tabla de productos canjeados-->
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <table class="table container-lg" >
      <thead>
          <tr>
              <th scope="col">Producto</th>
              <th scope="col">Estado</th>
          </tr>
      </thead>
      <tbody>
        <?php
        $conexion = new Database();
        $conexion->conectarDB();
        $consulta="SELECT productos.Nombre_Producto as Nproducto, Estado FROM sge.productos_comprobante join productos on FK_ID_Productos = ID_Productos where FK_Matricula_Alum=$_SESSION[matricula]";
        $table=$conexion->seleccionar($consulta);
        foreach($table as $registro)
        {
          echo"
           <tr>
              <td scope='row'>$registro->Nproducto</td>
              <td>$registro->Estado</td>
          </tr>
        ";}$conexion->desconectarDB();
          ?>
      </tbody>
    </table>
  </div>
</div>
    </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
function ConfirmDelete()
{
  var respuesta = confirm("¿ESTAS SEGURO QUE DESEAS CANJEAR?")
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

</script>
<!-- Core theme JS-->
<script src="../js/sidebar.js"></script>
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