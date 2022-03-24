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
<div class="container-fluid">
		<div class="row main-content bg-success text-center">
			<div class="col-md-4 text-center company__info">
				<span class="company__logo"><h2><span class="fa fa-android"></span></h2></span>
				<img src="img/SGE/Illustration.png" alt="">
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">

					<div class="row py-3">
						
						<h2>Recuperacion de contraseña</h2>
					</div>
					<div class="row">
					<form id="login-form" class="form-group" action="Recuperarpass.php" method="post">
							<div class="row">
								<input type="text" name="CorreoElectronico" class="form__input" placeholder="Correo">
							</div>
							<div class="col-12">
							
							</div>
                            <div class="col-12">
								<button type="submit" class="btn btn-primary w-10" href="Recuperarpass.php" name="RecP">Recupera</button>
							</div>
						</form>
                        <?php
        if(isset($_POST['RecP'])){
            include 'Scripts/database.php';
            $db=new Database();
            $db->ConectarDB();
            
            $Cod=$db->ObtenerCodigo();
            extract($_POST);
            
            $consulta="DELETE FROM recuperarpassword WHERE Usuario = '".$CorreoElectronico."'";
			
            $db->ejecutaSQL($consulta);
            $consulta="INSERT INTO recuperarpassword VALUES('".$CorreoElectronico."', '".$Cod."')";
            $db->ejecutaSQL($consulta);

            $db->RecuperarPassword($CorreoElectronico, $Cod);
            
            $db->DesconectarDB($CorreoElectronico, $Cod);
            
        }
    ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>