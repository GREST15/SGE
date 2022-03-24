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
     $db = new Database();
     $db->conectarDB();

     extract($_POST);
     $cadena = "INSERT INTO `grupo_materias`(`ID_Grupo_Materia`,`Grupo`,`Materia`,`Profesor`) VALUES (null,'$grupo','$materia','$profesor')";

     $db->ejecutarSQL($cadena);   

?>
<script type="text/javascript">
    alert("Materia asignada exitosamente");
    history.go(-1)
    window.location.href='../AsigMaterias.php';
    
</script>    
</body>
</html>