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
    
     $cadena = "INSERT INTO `calif_tareas` (`tarea`, `alumno`, `calificacion`) VALUES ($tarea, $alumno, $calif)";
     $db->ejecutaSQL($cadena); 
    
     $cadena = "UPDATE alumnos set Puntos_Alumno= Puntos_Alumno + $calif WHERE Matricula_Alum = $alumno";
     $db->ejecutaSQL($cadena); 
     $db->desconectarDB();
?>
<script type="text/javascript">
    alert("CALIFICACION REGISTRADA EXITOSAMENTE");

    history.go(-1)
    
</script>  
    
</body>
</html>