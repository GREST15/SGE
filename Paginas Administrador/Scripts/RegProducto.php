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
        $nombreimg= $_FILES["imagen"]["name"]; // Para conocer el nombre del archivo
        $archivo= $_FILES["imagen"]["tmp_name"]; // La ruta del archivo contiene el nuevo nombre y el tipo de extension
        $ruta="images";
        $ruta=$ruta."/".$nombreimg;
        $upload_dir= move_uploaded_file($archivo, $ruta); //se sube el archivo

         $cadena = "INSERT INTO productos (Nombre_Producto, Stock_Producto, Costo_Producto,	imagen) VALUES ('$nombrep','$stock','$costo','$ruta')";
         $db->ejecutarSQL($cadena);

   

 

?>
<script type="text/javascript">
    // alert("PRODUCTO REGISTRADO EXITOSAMENTE");
    window.location.href='../RProductos.php';
    
</script>  
    
</body>
</html>