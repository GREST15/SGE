<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/Miscss.css">
    <link rel="stylesheet" href="../css/sidebar.css">   
    <title>Inicio</title>
</head>
<body>
<?php
        session_start();
        if($_SESSION['TipoUsuario'] == 3)
        {
          require '../Plantillas/Headers/HeaderAdmin.php';
            ?>
  
  <script src="../js/bootstrap.min.js"></script>

  <div class="container w-50">
                  <div class="modal-header">
                    <h5 >Registro de materia para el grupo</h5>
                  </div>
                  <div class="modal-body ">
                  <form action="Scripts/AsigMateriasG.php" method="post">


                  <?php
include 'Scripts/DBSGE.php';
 $conexion = new Database();
 $conexion->conectarDB();
 $id = $_GET['ID'];
 $cadena = "SELECT ID_Grupo, concat(carreras.Nombre_Carrera,' ',cuatrimestre.descripcion,' ',seccion,' ',turno) as nombre FROM grupos join cuatrimestre on grupos.Cuatrimestre=cuatrimestre.ID_Cuatrimestre join carreras on carreras.ID_Carrera=grupos.Carrera where ID_Grupo = $id";
 $reg = $conexion->seleccionar($cadena);
 echo "<div class=mb-3>
 <label for='exampleFormControlInput1' class='form-label'>Grupo</label>
 <select name='grupo' class='form-select'>";

 foreach ($reg as $value)
 {
     echo "<option value='".$value->ID_Grupo."'>$value->nombre</option>";
 }
 echo "</select>
 </div>";

  
?>
<?php
 $conexion = new Database();
 $conexion->conectarDB();
 
 $cadena = "SELECT * FROM materias";
 $reg = $conexion->seleccionar($cadena);

 echo "<div class=mb-3>
 <label for='exampleFormControlInput1' class='form-label'>Materia</label>
 <select name='materia' class='form-select'>";

 foreach ($reg as $value)
 {
     echo "<option value='".$value->ID_Materia."'>".$value->Nombre_Materia."</option>";
 }
 echo "</select>
 </div>";
 $conexion->desconectarDB();

  
?>
  <?php
/*Select de profesores*/
 $conexion = new Database();
 $conexion->conectarDB();
 
 $cadena = "SELECT * FROM profesores";
 $reg = $conexion->seleccionar($cadena);

 echo "<div class=mb-3>
 <label for='exampleFormControlInput1' class='form-label'>Profesor a impartir</label>
 <select name='profesor' class='form-select'>";

 foreach ($reg as $value)
 {
     echo "<option value='".$value->ID_Prof."'>".$value->Nombre."</option>";
 }
 echo "</select>
 </div>";
 $conexion->desconectarDB();
?>
<div class="modal-footer">
    
<button type="submit" class="btn button bgblue">Guardar</button>

</form>
<a href="RGrupos.php">
    <button type="button" class="btn btn-danger">Cancelar</button>
</a>
</div>

<?php
        } 
            ?>


</body>
</html>