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
  <!--Barra de navegacion-->
  <?php include '../Plantillas/Headers/HeaderProf.php'?>

  <script src="../js/bootstrap.min.js"></script>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    
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
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#Unidad" type="button" role="tab" aria-controls="profile" aria-selected="false">Unidades</button>
          </li> -->
          
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="Tareas" role="tabpanel" aria-labelledby="home-tab">
            
          
          
          
          
          <div class="container container w-50">
                  <div class="modal-header">
                    <h5 class="modal-title" id="Modalexamen">Calificar</h5>
                  </div>
                  <div class="modal-body ">
                            <form action="script/RegCalifTarea.php" method="post">
                              <?php
                                
                                  $conexion = new Database();
                                  $conexion->conectarDB();
                                  // 
                                  $cadena ="SELECT alumnos.Nombre,alumnos.Matricula_Alum from alumnos where alumnos.Matricula_Alum not in(SELECT alumno FROM calif_tareas where tarea = $_GET[idt]) and grupo =$_GET[IDgrupo]";
                                  // $cadena = "SELECT * from alumnos where alumnos.Grupo=$_GET[IDgrupo]";
                                  $reg = $conexion->seleccionar($cadena);
                                  
                                  echo "
                                  <label for='exampleFormControlInput1' class='form-label'>Actividad</label>
                                  <select name='tarea' class='form-select'>
                                  <option value='".$_GET["idt"]."'>".$_GET["nombret"]."</option>
                                  </select>
                                
                                  <label for='exampleFormControlInput1' class='form-label'>Alumno</label>
                                  <select name='alumno' class='form-select'>
                                  ";
                              
                                  foreach ($reg as $value)
                                  {
                                      echo "<option value='".$value->Matricula_Alum."'>".$value->Nombre."</option>";
                                      
                                  }
                                  echo"
                                  </select>
                                  <label for='exampleFormControlInput1' class='form-label'>Calificacion</label>
                                  <input name='calif' type='text' class='form-control' id='exampleFormControlInput1'>
                                  ";       
                                
                                  $conexion->desconectarDB();
                                    
                                ?> 
                               <br> <div class='text-end'>
                                  <button type='submit' class='btn button bggreen'>
                                   Guardar
                                  </button> 
                                </form>
                                <button  action="action" type="button" value="Back" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</button>
                                </div>
                                </div>       
                             
                  
                </div>
                
             
          
          </div>
          <!-- <div class="tab-pane fade" id="Examen" role="tabpanel" aria-labelledby="profile-tab">
            
            <table class="table container-lg" >
              <thead>
                  <tr>
                      <th scope="col">Alumno</th>
                      <th scope="col">Nombre de Examen</th>
                      <th scope="col">Calificacion</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <th scope="col">Nombre de Alumno</th>
                      <td scope="row">Examen 1</th>
                      <td><input type="text" class="form-control d-flex" id="calificacionexamen"></td>
                  </tr>
        
              </tbody>
            </table>
          <!-- Button trigger modal 
          <div class="container">
            <button type="button" class="btn button bggreen" data-bs-toggle="modal" data-bs-target="#Modalexamen">
              Guardar
            </button>
          </div>

 
        </div> -->

        <!-- <div class="tab-pane fade" id="Unidad" role="tabpanel" aria-labelledby="profile-tab">
            
          <table class="table container-lg" >
            <thead>
                <tr>
                    <th scope="col">Alumno</th>
                    <th scope="col">Unidad 1</th>
                    <th scope="col">Unidad 2</th>
                    <th scope="col">Unidad 3</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col">Nombre de Alumno</th>
                    <td scope="row"><input type="text" class="form-control d-flex" id="calificacionexamen"></th>
                    <td><input type="text" class="form-control d-flex" id="calificacionexamen"></td>
                    <td><input type="text" class="form-control d-flex" id="calificacionexamen"></td>
                </tr>
      
            </tbody>
          </table>
        <!-- Button trigger modal
        <div class="container">
          <button type="button" class="btn button bggreen" data-bs-toggle="modal" data-bs-target="#Modalexamen">
            Guardar
          </button>
        </div>


      </div> -->


      </div>

<!-- Core theme JS-->
<script src="../js/sidebar.js"></script>
    <?php
    }
    else
    {
      echo"<div class='alert alert-danger' role='alert text-center'>
      No tienes permiso para acceder a este apartado
    </div>";
    } $conexion->desconectarDB();
    ?>
</body>
</html>

