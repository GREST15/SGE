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
 $cadena = "UPDATE carreras SET Nombre_Carrera='$nombrem'  where ID_Carrera=$id";
 $conexion->ejecutarSQL($cadena); 
?>
<script type="text/javascript">
    alert("CARRERA ACTUALIZADO EXITOSAMENTE");
    window.location.href='../RCarreras.php';
    
</script>  
    
</body>
</html>

