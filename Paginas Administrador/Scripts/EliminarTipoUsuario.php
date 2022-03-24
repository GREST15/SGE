<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Registro</title>
</head>
<body>
    <?php
        try
        {
            include 'DBSGE.php';
            $conexion = new Database();
            $conexion->conectarDB();
            $id = $_GET['ID'];
            $cadena = "DELETE FROM tipo_usuario where ID_TipoUser=$id";
            $conexion->ejecutarSQL($cadena);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    ?>
    <script type="text/javascript">
        alert("Tipo de Usuario Eliminado Exitosamente");
        window.location.href='../R_TipoUsuario.php';
    </script>
</body>
</html>