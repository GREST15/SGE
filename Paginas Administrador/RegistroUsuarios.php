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
        { require '../Plantillas/Headers/HeaderAdmin.php';
            ?>
 
  <script src="../js/bootstrap.min.js"></script>
  <h2 align="center" style="color:whitesmoke">Registro de usuarios</h2>
          <!-- NAV BAR-->
        <div class="container">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#alumno" type="button" role="tab" aria-controls="home" aria-selected="true">Alta Usuarios</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profesor" type="button" role="tab" aria-controls="profile" aria-selected="false">Listado de Usuarios</button>
            </li>
     </div>
          <!--Contenido de registro-->

          <!--registro Usuarios-->
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="alumno" role="tabpanel" aria-labelledby="home-tab">
              <div class="container">
                <hr>
                <form action="Scripts/RegAlumnos.php" method="POST">
                <div class="mb-3">
                    <label class="control-label" for="matricula">Matricula</label>
                    <input type="text" name="matricula" placeholder ="Matricula" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="control-label" for="nombre">Nombre</label>
                    <input type="text" name="nombre" placeholder ="Nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="control-label" for="Apellido Paterno">Apellido Paterno</label>
                    <input type="text" name="appaterno" placeholder ="Apellido Paterno" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="control-label" for="apmaterno">Apellido Materno</label>
                    <input type="text" name="apmaterno" placeholder ="Apellido Materno" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="control-label" for="fechaNac">Fecha nacimiento</label>
                    <input type="date" name="fechaNac" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="control-label" for="telefono">Telefono</label>
                    <input type="text" name="telefono" placeholder ="Telefono" class="form-control" required>
                </div>              

                <?php
                include 'Scripts/DBSGE.php';
                $db = new Database();
                $db->conectarDB();
                $cadena = "SELECT ID_TipoUser, Nombre FROM tipo_usuario";
                $reg = $db->seleccionar($cadena);

                echo "<div class=mb-3>
                <label class='control-label'>
                Tipo usuario
                </label>
                <select name='TipoUser' class='form-select'>";
                foreach ($reg as $value)
                {
                    echo "<option value='".$value->ID_TipoUser."'>".$value->Nombre."</option>";
                }
                echo "</select>
                </div>";
                $db->desconectarDB();
                ?>
                <div class="mb-3">
                    <label class="control-label" for="correo">Correo</label>
                    <input type="text" name="correo" placeholder ="Correo" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="control-label" for="pass">Contraseña</label>
                    <input type="text" name="pass" placeholder ="Contraseña" class="form-control" required>
                </div>
                <div class="d-grid gap-2">
                <button class="btn btn-primary btn-lg" type="submit" >Guardar</button>
                </div>
                </form>
              </div>
            </div>

            <!--Lista SELECT de usuarios-->
            <div class="tab-pane fade show active" id="profesor" role="tabpanel" aria-labelledby="profile-tab">
              
              <div class="container">
                
                
                      <form action="" method="post">
                                  
                        <?php
                        /*lista select de Usuarios*/
                        $db2 = new Database();
                        $db2->conectarDB();
                        

                        $cadena = "SELECT * FROM tipo_usuario";
                        $reg = $db2->seleccionar($cadena);

                        echo "<div class=mb-3>
                        <label class='control-label'>
                        Tipo de usuario
                        </label>
                        <select name='usuario' class='form-select'>";
                        foreach ($reg as $value)
                        {
                            echo "<option value='".$value->ID_TipoUser."'>".$value->Nombre."</option>";
                        }
                        echo "</select>
                        </div>";
                        $db->desconectarDB();
                        ?>
                        <button type="submit" name="ver" class="btn btn button bggreen" style="width: 100%;">Ver</button>
                        </form>             
                        
                        
        <?php 
        /*CONDICIONES PARA FILTRAR ALUMNOS, ADMINISTRADORES,PROFESORES*/ 
        if($_POST)
        {
         
          extract($_POST);
          
          /*CONDICION DE ALUMNOS*/ 
          if($usuario==2)
          {
            echo "<hr>
            <h1>Alumnos <a href='BajaAlumno.php'><button type='button' class='btn button bgblue'>
            <h6>Alumnos con baja</h6></a>
          </button></h1>";
            echo"";
           
            $conexion = new Database();
            $conexion->conectarDB();

            $consulta="SELECT Matricula_Alum,Nombre,Apellido_Paterno,Apellido_Materno,Fecha_Nacimiento,Telefono,Correo, estado.Estado as estado FROM alumnos join estado on estado.ID_Status= alumnos.Status";

             $table=$conexion->seleccionar($consulta);


             echo "<table class ='table table-hover'
        <thead class='table-dark'>
        <tr>
        <th scope='col'>Matricula</th>
        <th scope='col'>Nombre</th>
        <th scope='col'>Apellido Paterno</th>
        <th scope='col'>Apellido Paterno</th>
        <th scope='col'>Nacimiento</th>
        <th scope='col'>Telefono</th>
        <th scope='col'>Correo</th>
        <th scope='col'>Status</th>
        </tr>
        </thead>
        <tbody>
        ";

        foreach($table as $registro)
        {
            echo "<tr>";
            echo "<td scope='col'> $registro->Matricula_Alum </td>";
            echo "<td scope='col'> $registro->Nombre </td>";
            echo "<td scope='col'> $registro->Apellido_Paterno</td>";
            echo "<td scope='col'> $registro->Apellido_Materno</td>";
            echo "<td scope='col'> $registro->Fecha_Nacimiento</td>";
            echo "<td scope='col'> $registro->Telefono</td>";
            echo "<td scope='col'> $registro->Correo</td>";
            echo "<td scope='col'> $registro->estado</td>";
            echo "<td scope='col'> 
            <a href='EditAlumno.php?ID=".$registro->Matricula_Alum."''><button  type='button' class='btn button bggreen'>Editar</button></a>
            <a href='Scripts/EliminarAlumno.php?ID=".$registro->Matricula_Alum."'> <button type='button' class='btn btn-danger' onclick='return ConfirmDeleteAlum()'>Eliminar</button></a>
            </td>
            ";
            echo "<td><a href='AsigAlumnoAGrupo.php?ID=".$registro->Matricula_Alum."''><button  type='button' class='btn button bggreen' data-bs-toggle='modal' data-bs-target='#Modalmateria'>
          Asignar grupo
           </button></td>";
            echo "</tr>";
        }
        echo "</tbody> </table>";
        $conexion->desconectarDB();
      }

      /*CONDICION DE PROFESORES*/
      if($usuario==1)
      {
        echo"<h1>Profesores</h1>";
        $conexion = new Database();
        $conexion->conectarDB();

        $consulta="SELECT ID_Prof,Nombre,Apellido_Paterno,Apellido_Materno,Fecha_Nacimiento,Telefono,Correo FROM profesores";

         $table=$conexion->seleccionar($consulta);


         echo "<table class ='table table-hover'
    <thead class='table-dark'>
    <tr>
    <th>Matricula</th>
    <th>Nombre</th>
    <th>Apellido Paterno</th>
    <th>Apellido Paterno</th>
    <th>Nacimiento</th>
    <th>Telefono</th>
    <th>Correo</th>
    </tr>
    </thead>
    <tbody>
    ";

    foreach($table as $registro)
    {
        echo "<tr>";
        echo "<td> $registro->ID_Prof </td>";
        echo "<td> $registro->Nombre </td>";
        echo "<td> $registro->Apellido_Paterno</td>";
        echo "<td> $registro->Apellido_Materno</td>";
        echo "<td> $registro->Fecha_Nacimiento</td>";
        echo "<td> $registro->Telefono</td>";
        echo "<td> $registro->Correo</td>";
        echo "<td scope='col'> 
        <a href='EditProfesor.php?ID=".$registro->ID_Prof."''><button  type='button' class='btn button bggreen'>Editar</button></a>
        <a href='Scripts/EliminarProfesor.php?ID=".$registro->ID_Prof."'> <button type='button' class='btn btn-danger' onclick='return ConfirmDeleteProf()'>Eliminar</button></a>
        </td>
        ";
        echo "</tr>";
    }
    echo "</tbody> </table>";
    $conexion->desconectarDB();
  }
  /*Condicion de administradores*/ 

  if($usuario==3)
  {
    echo"<h1>Administradores</h1>";
    $conexion = new Database();
    $conexion->conectarDB();

    $consulta="SELECT ID_Admin,Nombre,Apellido_Paterno,Apellido_Materno,Fecha_Nacimiento,Telefono,Correo FROM administradores";

     $table=$conexion->seleccionar($consulta);


     echo "<table class ='table table-hover'
<thead class='table-dark'>
<tr>
<th>Matricula</th>
<th>Nombre</th>
<th>Apellido Paterno</th>
<th>Apellido Paterno</th>
<th>Nacimiento</th>
<th>Telefono</th>
<th>Correo</th>
</tr>
</thead>
<tbody>
";

foreach($table as $registro)
{
    echo "<tr>";
    echo "<td> $registro->ID_Admin </td>";
    echo "<td> $registro->Nombre </td>";
    echo "<td> $registro->Apellido_Paterno</td>";
    echo "<td> $registro->Apellido_Materno</td>";
    echo "<td> $registro->Fecha_Nacimiento</td>";
    echo "<td> $registro->Telefono</td>";
    echo "<td> $registro->Correo</td>";
    echo "<td scope='col'> 
            <a href='EditAdministrador.php?ID=".$registro->ID_Admin."''><button  type='button' class='btn button bggreen'>Editar</button></a>
            <a href='Scripts/EliminarAdministrador.php?ID=".$registro->ID_Admin."'> <button type='button' class='btn btn-danger' onclick='return ConfirmDelete()'>Eliminar</button></a>
            </td>
            ";   
    echo "</tr>";
}
echo "</tbody> </table>";
$conexion->desconectarDB();
}
    }
            
        ?>
              </div>  
              
    <script type="text/javascript">
function ConfirmDelete()
{
  var respuesta = confirm ("¿ESTAS SEGURO QUE DESEAS ELIMINAR?")
  if (respuesta==true)
  {
    return true;
  }
  else
  {
    return false;
  }
}
function ConfirmDeleteAlum()
{
  var respuesta = confirm ("¿ESTAS SEGURO QUE DESEAS ELIMINAR? SI LO ELIMINA TAMBIEN SE ELIMINARA DEL GRUPO QUE PERTENECE")
  if (respuesta==true)
  {
    return true;
  }
  else
  {
    return false;
  }
}
function ConfirmDeleteProf()
{
  var respuesta = confirm ("¿ESTAS SEGURO QUE DESEAS ELIMINAR? SI LO ELIMINA TAMBIEN SE ELIMINARA LA MATERIA DEL GRUPO QUE ESTA IMPARTIENDO ?")
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
        </div>
 </div>
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

