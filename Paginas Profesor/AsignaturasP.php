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
        if($_SESSION['TipoUsuario'] == 1)
        {
            ?>
 <?php include '../Plantillas/Headers/HeaderProf.php'?>
 
  


  
  <div class="d-flex" id="wrapper">

  <?php include '../Plantillas/Sidebar/Sidebarprof.php' ?>
    
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bggreen">
            <div class="container-fluid">
                <button type="button" class="btn bggreen" id="sidebarToggle">
                  <h5>Menu Materias</h5>
               </button> 
               <hr>
              </div>
 
        </nav>
        <!-- Page content-->
        
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#Tareas" type="button" role="tab" aria-controls="home" aria-selected="true">Tareas</button>
          </li>
          <!-- <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#Examen" type="button" role="tab" aria-controls="profile" aria-selected="false">Examenes</button>
          </li> -->
          
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="Tareas" role="tabpanel" aria-labelledby="home-tab">
            <table class="table container-lg text-center" >
              <thead>

                  <tr>
                      <th scope="col">Nombre de Tarea</th>
                      <th scope="col">Descripcion</th>
                  </tr>
              </thead>
              <tbody>

             <?php
                
        $conexion = new Database();
        $conexion->conectarDB();

        $consulta="SELECT * FROM tareas where grupo= $_GET[IDgrupomateria]";

        $table=$conexion->seleccionar($consulta);
 
          foreach($table as $registro)
                 {          
                      echo "<tr>
                      <td scope='row'>$registro->Nombre</th>
                      <td scope='row'>$registro->Descripcion</td>
                      <td scope='row'><a  href='Calificaciones.php?idt=$registro->ID_Tarea&nombret=$registro->Nombre&IDgrupomateria=$_GET[IDgrupomateria]&IDgrupo=$_GET[IDgrupo]'> <button type='button' class='btn button bgblue'>
                      Calificar
                    </button>
                <a  href='CalifiacionesTareasAlumno.php?idt=$registro->ID_Tarea&nombret=$registro->Nombre&IDgrupomateria=$_GET[IDgrupomateria]&IDgrupo=$_GET[IDgrupo]'> <button type='button' class='btn btn-success'>
                    Registro de calificaciones
                  </button>
                  <a  href='script/EliminarTarea.php?idt=$registro->ID_Tarea&nombret=$registro->Nombre&IDgrupomateria=$_GET[IDgrupomateria]&IDgrupo=$_GET[IDgrupo]'> <button type='button' class='btn btn-danger' onclick='return ConfirmDelete()'>
                  Eliminar
                  </button>
                  </td>
                  </tr>
                 ";
                 }$conexion->desconectarDB();
                 ?>
                <p>
 
        
              
              </tbody>
            </table>
          <!-- Button trigger modal -->
          <div class="container text-end">
            <button type="button" class="btn button bggreen" data-bs-toggle="modal" data-bs-target="#Modaltarea">
              Añadir Nueva Tarea
            </button>
          </div>  

          </div>
          <div class="tab-pane fade" id="Examen" role="tabpanel" aria-labelledby="profile-tab">
            
            <table class="table container-lg" >
              <thead>
                  <tr>
                      <th scope="col">Nombre de Examen</th>
                      <th scope="col">Descripcion</th>
                  </tr>
              </thead>
              <tbody>
              <?php
                $conexion = new Database();
                $conexion->conectarDB();
        
                $consulta="SELECT * FROM examen where grupo= $_GET[IDgrupomateria]";
        
                $table=$conexion->seleccionar($consulta);
         
                  foreach($table as $registro)
                         {          
                              echo "<tr>
                              <td scope='row'>$registro->nombre</th>
                              <td>$registro->descripcion</td>
                              <td><a  href='Calificaciones.php?ID=$registro->idexamen'> <button type='button' class='btn button bggreen'>
                              Ver
                            </button>
                            </td>
                          </tr>
                         ";
                         }
                         $conexion->desconectarDB();
                         ?>
        
              </tbody>
            </table>
          <!-- Button trigger modal -->
          <div class="container">
            <button type="button" class="btn button bggreen" data-bs-toggle="modal" data-bs-target="#Modalexamen">
              Añadir Nuevo Examen
            </button>
          </div>

        </div>

      <!-- Modal Examen -->
      <div class="modal fade " id="Modalexamen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content bggreen">
            <div class="modal-header">
              <h5 class="modal-title" id="Modalexamen">Añadir Examen</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
            <form action="script/RegExamen.php" method="POST">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nombre de Examen</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nombre" placeholder="Titulo">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" placeholder="Escribe aqui..." rows="3"></textarea>
              </div>
             <input type="text" name="grupo" value="<?= $_GET["IDgrupomateria"]?>">
     
            </div>
            <div class="modal-footer">
              <button type="button" class="btn button" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn button">Guardar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal Tarea -->
      <div class="modal fade " id="Modaltarea" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content bggreen">
            <div class="modal-header">
              <h5 class="modal-title" id="Modaltarea">Añadir Tarea</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
            <form action="script/RegTarea.php" method="POST">

            <input hidden type="text"name="grupo" value="<?=$_GET["IDgrupomateria"]?>" class="form-control">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nombre de tarea</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name ="nombre"placeholder="Titulo">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Escribe aqui..." name ="descripcion" rows="3"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn button" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit"  class="btn button">Guardar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      </div>

<!-- Core theme JS-->

<script type="text/javascript">
function ConfirmDelete()
{
  var respuesta = confirm ("Se eliminaran todas sus califiaciones, ¿esta seguro?")
  if (respuesta==true)
  {
    return true;
  }
  else
  {
    return false;
  }
}
</script>
<script src="../js/bootstrap.min.js"></script>    
<script src="../js/sidebar.js"></script>

    <?php
    }
    else
    {
      echo"<div class='alert alert-danger' role='alert text-center'>
      No tienes permiso para acceder a este apartado
    </div>";
    }
    ?>
</body>
</html>

