<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/loggin.css">
    <link rel="stylesheet" href="css/Miscss.css">
    <title>Document</title>
</head>
<body>
<?php
session_start();
if (isset($_SESSION["usuario"]))
{
    echo"<div class='alert alert-warning'>
    <h2 align='center'> ya existe una sesion activa .usuario: ".$_SESSION["usuario"]."</h2>";
    echo "<h3 align='center'> <a href='../scripts/cerrarSesion.php'> [Cerrar Sesion] </h3>
    </div>
    ";
}
else{
?>
      <!--Barra de navegacion-->
      <nav class="navbar bggreen">
        <div class="container">
            <div class="col-12 text-center">
          <a class="navbar-brand " href="#">
            <img src="img/SGE/SGE.png" alt="" width="70" height="70">
          </a>
        </div>
        </div>
      </nav>

	<!-- Contenido principal -->
	<div class="container-fluid">
		<div class="row main-content bg-success text-center">
			<div class="col-md-4 text-center company__info">
				<span class="company__logo"><h2><span class="fa fa-android"></span></h2></span>
				<img src="img/SGE/Illustration.png" alt="">
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">

					<div class="row py-3">
						
						<h2>Inicio de sesion</h2>
					</div>
					<div class="row">
					<form id="login-form" class="form-group" action="Scripts/VerificaLogin.php" method="post">
							<div class="row">
								<input type="text" name="usuario" class="form__input" placeholder="Correo" required>
							</div>
							<div class="row">
								
								<input type="password" name="contraseña" class="form__input" placeholder="Contraseña" required>
							</div>
							
							<div class="col-12">
								<input type="submit" name="login" value="Iniciar" class="btn">
							</div>
                            <div class="col-12">
								
								<a href="Recuperarpass.php"><label for="remember_me">Recuperar contraseña</label></a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>    

  
</body>
<?php
}
?>
</html>