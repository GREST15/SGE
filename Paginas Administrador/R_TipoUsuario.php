<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/Miscss.css">
    <script src="../js/bootstrap.min.js"></script>
    <title>Inicio</title>
</head>
<body>
    <?php
        session_start();
        if($_SESSION['TipoUsuario'] == 3)
        {
            require '../Plantillas/Headers/HeaderAdmin.php';
            ?>
  

    <h2 align="center" style="color:whitesmoke">Tipos de Usuarios</h2>
    <!-- NAV BAR-->
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#productos" type="button" role="tab" aria-controls="home" aria-selected="true">Tipos de Usuario</button>
            </li>
            <li class="nav-item" role="presentation">
                <button type="button" class="btn button bggreen" data-bs-toggle="modal" data-bs-target="#ModalTipoUsuario">
                    Añadir Nuevo Tipo de Usuario
                </button>
            </li>
        </div>
        <!--Contenido de registro-->
        <!--LISTADO Y REGISTRO DE PRODUCTOS-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tipousuarios" role="tabpanel" aria-labelledby="home-tab">
                <div class="container ">
                <?php
                    include '../Scripts/database.php';
                    $conexion = new Database();
                    $conexion->conectarDB();
                    $consulta="SELECT * FROM tipo_usuario";
                    $table=$conexion->seleccionar($consulta);
            echo "  <table class='table container-lg text-center'>
                        <thead>
                            <tr>
                                <th scope='col'>Tipo Usuario</th>
                                <th scope='col'>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>";
                    foreach($table as $registro)
                    {
                    echo "  <tr>
                                <td scope='col'> $registro->ID_TipoUser</td>
                                <td scope='col'> $registro->Nombre</td>
                                <td scope='col'> 
                                    <a href='EditTipoUsuario.php?ID=".$registro->ID_TipoUser."''><button  type='button' class='btn button bggreen'>Editar</button></a>
                                    <a href='Scripts/EliminarTipoUsuario.php?ID=".$registro->ID_TipoUser."'> <button type='button' class='btn btn-danger' onclick='return ConfirmDelete()'>Eliminar</button></a>
                                </td>
                            </tr>";
                    }
                    echo"</tbody>
                    </table>";
                    $conexion->desconectarDB();
                ?>
                <script type="text/javascript">
                    function ConfirmDelete()
                    {
                        var respuesta = confirm ("¿ESTAS SEGURO QUE DESEAS ELIMINAR EL TIPO DE USUARIO? AL ELIMINAR SE DESASIGNARA DEL USUARIO")
                        if (respuesta==true)
                        { return true; }
                        else { return false; }
                    }
                </script>
                <!--REGISTRO DE TIPO USUARIO-->
                <div class="modal fade " id="ModalTipoUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bggreen">
                            <div class="modal-header">
                                <h5 class="modal-title">Añadir Tipo Usuario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="Scripts/RegTipoUsuario.php" method="post">
                                <div class="modal-body ">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" name="Nombre" class="form-label">Nombre del Tipo de Usuario</label>
                                        <input type="text" class="form-control" name="Nombre" id="exampleFormControlInput1" required>
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