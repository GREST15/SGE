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
    $cadena = "DELETE FROM profesores where ID_Prof=$id";
    $conexion->ejecutarSQL($cadena);
     
  }
  catch(PDOException $e)
  {
      echo $e->getMessage();
  }

?>

<script type="text/javascript">
    alert("PROFESOR ELIMINADO EXITOSAMENTE");
    window.history.go(-2);
    
</script>  

</body>
</html>