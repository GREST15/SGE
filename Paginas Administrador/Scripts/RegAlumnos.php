<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegistrarAlumno</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>
<body>

<?php
     include 'DBSGE.php';
     $db = new Database();
     $db->conectarDB();

     extract($_POST);

                    
                    if($TipoUser == 2)
                    {
                        $db1 = new Database();
                        $db1->conectarDB();

                        extract($_POST);
                        $puntos = 0;
                        $estado=1;
                        $hash = password_hash($pass, PASSWORD_DEFAULT);
                        $cadena = "INSERT INTO alumnos(Matricula_Alum,Nombre,Apellido_Paterno,Apellido_Materno,Fecha_Nacimiento,Telefono,Puntos_Alumno,Correo,Contraseña,FK_Tipo_Usuario,Grupo,Status)
                        VALUES ('$matricula','$nombre','$appaterno','$apmaterno','$fechaNac','$telefono','$puntos','$correo','$hash',2,0,$estado)";
                        $db1->ejecutarSQL($cadena);
                        
                        echo "<div class='alert alert-success text-center'> ALUMNO REGISTRADO</div>";
                        header( "refresh:2;../RegistroUsuarios.php" );
                    }
                    elseif($TipoUser == 1)
                    {
                        $db2 = new Database();
                        $db2->conectarDB();

                        extract($_POST);
                        $hash = password_hash($pass, PASSWORD_DEFAULT);
                        $cadena = "INSERT INTO profesores(ID_Prof,Nombre,Apellido_Paterno,Apellido_Materno,Fecha_Nacimiento,Telefono,Correo,Contraseña,FK_Tipo_Usuario)
                        VALUES ('$matricula','$nombre','$appaterno','$apmaterno','$fechaNac','$telefono','$correo','$hash',1)";

                        $db2->ejecutarSQL($cadena);

                        echo "<div class='alert alert-success text-center'> PROFESOR REGISTRADO </div>";
                        header( "refresh:2;../RegistroUsuarios.php" );
                    }
                    elseif($TipoUser == 3)
                    {
                        $db3 = new Database();
                        $db3->conectarDB();
                        extract($_POST);
                        $hash = password_hash($pass, PASSWORD_DEFAULT);
                        $cadena = "INSERT INTO administradores(ID_Admin,Nombre,Apellido_Paterno,Apellido_Materno,Fecha_Nacimiento,Telefono,Correo,Contraseña,FK_Tipo_Usuario)
                        VALUES ('$matricula','$nombre','$appaterno','$apmaterno','$fechaNac','$telefono','$correo','$hash',3)";

                        $db3->ejecutarSQL($cadena);

                        echo "<div class='alert alert-success text-center'> ADMINISTRADOR REGISTRADO </div>";

                        header( "refresh:2;../RegistroUsuarios.php" );
                    }
                    else
                    {
                        echo "<div class='alert alert-danger text-center'> NO SE PUDO REALIZAR LA ACION</div>";
                    }
                   
?>  
</body>
</html>


