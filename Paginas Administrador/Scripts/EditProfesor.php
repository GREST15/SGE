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
 $cadena = "UPDATE `profesores` SET `ID_Prof` = $id, `Nombre` = '$nombre', `Apellido_Paterno` = '$apellidop', `Apellido_Materno` = '$apellidom', `Fecha_Nacimiento` = '$fecha', `Telefono` = '$telefono', `Correo` = '$correo' WHERE `profesores`.`ID_Prof` = $id
 ";
 $conexion->ejecutarSQL($cadena); 
?>
<script type="text/javascript">
    alert("PROFESOR ACTUALIZADO EXITOSAMENTE");
    window.location.href='../RegistroUsuarios.php';
    
</script>  
    
</body>
</html>
