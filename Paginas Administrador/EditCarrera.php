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
                    <h5 class="modal-title" id="Modalexamen">Editar Materia</h5>
                  </div>
                  <div class="modal-body ">
                            <form action="Scripts/EditCarrera.php" method="post">
                              <?php
                                include 'Scripts/DBSGE.php';
                                  $conexion = new Database();
                                  $conexion->conectarDB();
                                  $id = $_GET['ID']; 
                                  $cadena = "SELECT * FROM carreras WHERE ID_Carrera = $id";
                                  $reg = $conexion->seleccionar($cadena);
                                  
                                foreach($reg as $registro)
                                {
                                    
                                    $nombre = $registro->Nombre_Carrera;

                                }
                                  
                                  
                                  echo "<div class=mb-3>
                                  <label for='exampleFormControlInput1' class='form-label'>ID DE LA Carrera</label>
                                  <input name='id' value='$id' type='text' class='form-control' id='exampleFormControlInput1 ' readonly>
                                  <label for='exampleFormControlInput1' class='form-label'>Nombre de Carrera</label>
                                  <input name='nombrem' value='$nombre' type='text' class='form-control' id='exampleFormControlInput1' >

                                  ";       
                                
                                  echo "</select>
                                  </div> ";

                                  $conexion->desconectarDB();
                                    
                                ?> 
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn button bgblue">Guardar</button>
                             </form>
                             <a href="RCarreras.php"><button class="btn btn-danger">Cancelar</button></a>
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
    
    
 