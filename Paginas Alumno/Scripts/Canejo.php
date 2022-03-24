<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/Miscss.css">
    <title>Registro</title>
</head>
<body class="bgblue">
<?php

     include '../../Scripts/database.php';
     $db = new Database();
     $db->conectarDB();

     extract($_POST);

if ($_GET['puntos'] > $_GET['costo'] and $_GET['stock'] > 0 )
{

     $cadena = "INSERT INTO productos_comprobante(FK_ID_Productos, FK_Matricula_Alum, Estado) VALUES($_GET[producto],$_GET[alumno], 'No Recogido')";
     $db->ejecutaSQL($cadena); 
     
     $cadena = "UPDATE alumnos set Puntos_Alumno = Puntos_Alumno - $_GET[costo] where Matricula_Alum = $_GET[alumno]";
     $db->ejecutaSQL($cadena);
     $cadena ="UPDATE productos set Stock_Producto = Stock_Producto - 1 where ID_Productos = $_GET[producto]";
     $db->ejecutaSQL($cadena);
  

       
    echo "<div class='alert alert-success' role='alert'>
  <h4 class='alert-heading'>Producto Canjeado!</h4>
  <p>Felicidades tu producto ha sido canjeado con exito. Por favor dirigete al departamento de administracion para recoger tu producto</p>
  <hr>

</div>";}
else
{
  echo "<div class='alert alert-danger' role='alert'>
  <h4 class='alert-heading'>Puntos o productos insuficientes</h4>
  <p>Echale mas ganas para que completes</p>
  <hr>
</div>";
}
$db->desconectarDB();
header( "refresh:3;url=../Recompensa.php" );
?>  
    
</body>
</html>