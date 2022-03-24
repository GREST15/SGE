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
    $cadena = "DELETE FROM materias where ID_Materia=$id";
    $conexion->ejecutarSQL($cadena);
     
  }
  catch(PDOException $e)
  {
      echo $e->getMessage();
  }

?>

<script type="text/javascript">
    alert("MATERIA ELIMINADA EXITOSAMENTE");
    window.location.href='../RMaterias.php';
    
</script>  

</body>
</html>