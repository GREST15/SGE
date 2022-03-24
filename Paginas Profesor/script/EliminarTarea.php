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
include '../../Scripts/database.php';
 $conexion = new Database();
 $conexion->conectarDB();
 $cadena = "DELETE FROM tareas where ID_Tarea=$_GET[idt]";
 $conexion->ejecutaSQL($cadena); 
?>
<script type="text/javascript">
    alert("Tarea Eliminado Exitosamente");
    history.go(-1)
    
</script>  
    
</body>
</html>