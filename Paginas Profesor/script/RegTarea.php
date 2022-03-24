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
     $db = new Database();
     $db->conectarDB();

     extract($_POST);

     $cadena = "INSERT INTO tareas(nombre,descripcion,grupo) VALUES ('$nombre','$descripcion','$grupo')";
     $db->ejecutaSQL($cadena);     

?>
<script type="text/javascript">
    alert("TAREA REGISTRADA EXITOSAMENTE");
    window.location.href='../Asignaturasp.php';
    history.go(-1)
    
</script>  
    
</body>
</html>