
<?php

class Database
{
    private $PDOLocal;
    private $user = "Integradora";
    private $password = "Integradora123";
    private $server ="mysql:host=3.138.231.47:3306; dbname=sge";
    
    
    function conectarDB()
    {
        try 
        {
            $this->PDOLocal =new PDO($this->server,$this->user,$this->password);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    function desconectarDB()
    {
        try 
        {
            $this->PDOLocal = null;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function seleccionar($consulta)
    {
        try
        {
            $resultado= $this->PDOLocal->query($consulta);
            $fila= $resultado->fetchALL(PDO::FETCH_OBJ);
            return $fila;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    function ejecutaSQL($cadena)
    {
        try
        {
            $this->PDOLocal->query($cadena);
        }
    
        catch(PDOException $e)
        {
        echo $e->getMessage();
        }
    }

    function verificarLogin($usuario,$contraseña)
    {
        try
        {
            $pase=0;
            $query="SELECT*FROM administradores where Correo='$usuario'";
            $consulta = $this->PDOLocal->query($query);
            
            while($renglon = $consulta->fetch(PDO::FETCH_ASSOC))
            {
                if(password_verify($contraseña,$renglon['Contraseña']))
                {
                    $pase=1;
                }

                if ($pase>0)
                {
                    session_start();
                    $_SESSION['Nombre'] =$renglon['Nombre'];

                    $_SESSION['TipoUsuario'] = $renglon['FK_Tipo_Usuario'];
                    $_SESSION["apellidop"]= $renglon['Apellido_Paterno'];
                    $_SESSION["apellidom"]= $renglon['Apellido_Materno'];
                    $_SESSION["fechan"]= $renglon['Fecha_Nacimiento'];
                    $_SESSION["correo"]= $renglon['Correo'];
                    $_SESSION["telefono"]= $renglon['Telefono'];
                    $_SESSION['TipoUsuario'] = $renglon['FK_Tipo_Usuario'];
                    echo"<div class='alert alert-success'>";
                    echo "<h2 align='center'>Bienvenido ".$_SESSION['Nombre']."</h2>";
                    echo"<div>";
                    header("refresh:2 ../Paginas Administrador/Inicio.php");
                }
                
            }
            if ($pase==0)
            {
                $query="SELECT*FROM profesores where Correo='$usuario'";
                $consulta = $this->PDOLocal->query($query);
                
                while($renglon = $consulta->fetch(PDO::FETCH_ASSOC))
                {
                    if(password_verify($contraseña,$renglon['Contraseña']))
                    {
                        $pase=1;
                    }
    
                    if ($pase>0)
                    {
                        session_start();
                        $_SESSION["usuario"]=$renglon['ID_Prof'];
                        $_SESSION["apellidop"]= $renglon['Apellido_Paterno'];
                        $_SESSION["apellidom"]= $renglon['Apellido_Materno'];
                        $_SESSION["fechan"]= $renglon['Fecha_Nacimiento'];
                        $_SESSION["correo"]= $renglon['Correo'];
                        $_SESSION["telefono"]= $renglon['Telefono'];
                        $_SESSION['TipoUsuario'] = $renglon['FK_Tipo_Usuario'];
                        $_SESSION['Nombre'] =$renglon['Nombre'];
                        echo"<div class='alert alert-success'>";
                        echo "<h2 align='center'>Bienvenido ".$_SESSION['Nombre']."</h2>";
                        echo"<div>";
                        header("refresh:2 ../Paginas Profesor/InicioAsign.php");
                    }
                    
                }
            }
            if ($pase==0)
            {
                $query="SELECT*FROM alumnos where Correo='$usuario'";
                $consulta = $this->PDOLocal->query($query);
                
                while($renglon = $consulta->fetch(PDO::FETCH_ASSOC))
                {
                    if(password_verify($contraseña,$renglon['Contraseña']) and $renglon['Status'] ==1 )
                    {
                        $pase=1;
                    }
    
                    if ($pase>0)
                    {
                        session_start(); 
                        $_SESSION['matricula'] = $renglon['Matricula_Alum']; 
                        $_SESSION['Nombre'] =$renglon['Nombre'];
                        $_SESSION['TipoUsuario'] = $renglon['FK_Tipo_Usuario'];
                        $_SESSION["apellidop"]= $renglon['Apellido_Paterno'];
                        $_SESSION["apellidom"]= $renglon['Apellido_Materno'];
                        $_SESSION["fechan"]= $renglon['Fecha_Nacimiento'];
                        $_SESSION["correo"]= $renglon['Correo'];
                        $_SESSION["telefono"]= $renglon['Telefono'];
                        $_SESSION["grupo"]= $renglon['Grupo'];
                        $_SESSION["puntos"]= $renglon['Puntos_Alumno'];

                        echo"<div class='alert alert-success'>";
                        echo "<h2 align='center'>Bienvenido ".$_SESSION['Nombre']."</h2>";
                        echo"<div>";
                        header("refresh:2 ../Paginas Alumno/Inicio.php");
                        
                    }
                    
                }
            }
            if ($pase==0)
            {
                echo"<div class='alert alert-danger'>";
                echo "<h2 align='center'>Usuario o contraseña incorrecta</h2>";
                echo"<div>";
                header("refresh:2 ../Loggin.php");
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    function cerrarSesion()
    {
        session_start();
        session_destroy();
        header("location: ../Index.php");
    }

    function ObtenerCodigo()
    {
        $numero_aleatorio = rand(100000,999999);
        return $numero_aleatorio;
    }

    function RecuperarPassword($Correo, $Codigo)
    {
        require("PHPMailer.php");
        require("SMTP.php");
        require("Exception.php");
        
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP();

        $mail->CharSet="UTF-8";
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPDebug = 1; 
        $mail->Port = 465; //465 or 587

        $mail->SMTPSecure = 'ssl';  
        $mail->SMTPAuth = true; 
        $mail->IsHTML(true);

        $emprin="SistemaDeGestionEducativa@gmail.com";
        //Authentication
        $mail->Username = $emprin;
        $mail->Password = "uttsge2021";

        //Set Params
        $mail->SetFrom($emprin);
        $mail->AddAddress($Correo);
        $mail->Subject = "Recuperar Contraseña";
        $mail->Body = "Hola, para recuperar tu contraseña usa el siguiente código <br>
                        <b><u>$Codigo</u></b>";

                        
        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message has been sent";
        }
    }

}
?>