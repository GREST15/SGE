<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/Miscss.css">
        <link rel="stylesheet" href="../css/sidebar.css">
        <script src="../js/bootstrap.min.js"></script>
        <title>Document</title>
    </head>
<body>
<?php
        session_start();
        if($_SESSION['TipoUsuario'] == 3)
        { 
            require '../Plantillas/Headers/HeaderAdmin.php';
            ?>
    
    <!-- Modal materia -->
    <div class="container container w-50">
        <div class="modal-header">
            <h5 class="modal-title" id="Modalexamen">Editar Tipo de Usuario</h5>
        </div>
        <div class="modal-body ">
            <form action="" method="post">
                <?php
                    include 'Scripts/DBSGE.php';
                    $conexion = new Database();
                    $conexion->conectarDB();
                    $id = $_GET['ID']; 
                    $cadena = "SELECT * FROM tipo_usuario WHERE ID_TipoUser = $id";
                    $reg = $conexion->seleccionar($cadena);
                    foreach($reg as $registro)
                    {
                        $nombre = $registro->Nombre;
                    }
        echo "  <div class=mb-3>
                    <label for='exampleFormControlInput1' class='form-label'>Tipo de Usuario</label>
                    <input name='ID_TipoUser' value='$id' type='text' class='form-control' id='exampleFormControlInput1 ' readonly>
                    <label for='exampleFormControlInput1' class='form-label'>Nombre</label>
                    <input name='Nombre' value='$nombre' type='text' class='form-control' id='exampleFormControlInput1'>
                </div> ";
                    $conexion->desconectarDB();
                ?> 
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn button bgblue">Guardar</button>
                   
            </form>
            <a href="R_TipoUsuario.php"><button class="btn btn-danger">Cancelar</button></a>
            </div>
        </div>
    </div>
    <?php
        if($_POST)
        {
            $db = new Database();
            $db->conectarDB();
        
            extract($_POST);
            $cadena = "  UPDATE tipo_usuario SET Nombre = '$Nombre' WHERE ID_TipoUser = $ID_TipoUser";
            $err= $db->ejecutarSQL($cadena);
            $db->desconectarDB();
            echo "
            <script type='text/javascript'>
                alert('Tipo de Usuario Actualizado Exitosamente');
                setTimeout(function() { window.location = 'R_TipoUsuario.php'; }, 10);
            </script>";
        }
        ?>              <?php
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
