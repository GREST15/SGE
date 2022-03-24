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
include 'DBSGE.php';
 $conexion = new Database();
 $conexion->conectarDB();
 extract($_POST);
 $cadena = "UPDATE `administradores` SET `ID_Admin` = $id, `Nombre` = '$nombre', `Apellido_Paterno` = '$apellidop', `Apellido_Materno` = '$apellidom', `Fecha_Nacimiento` = '$fecha', `Telefono` = '$telefono', `Correo` = '$correo' WHERE `administradores`.`ID_Admin` = $id
 ";
 $conexion->ejecutarSQL($cadena); 
?>
<script type="text/javascript">
    alert("ADMINISTRADOR ACTUALIZADO EXITOSAMENTE");
    window.location.href='../RegistroUsuarios.php';
    
</script>  
    
</body>
</html>
