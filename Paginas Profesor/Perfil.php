<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/Miscss.css">
    <link rel="stylesheet" href="../css/Perfil.css">
    <title>Document</title>
</head>
<body>
<?php
        session_start();
        if($_SESSION['TipoUsuario'] == 3)
        {
          
            ?>
 <?php include '../Plantillas/Headers/HeaderProf.php'?>

 <script src="../js/bootstrap.min.js"></script>
  
  <div class="container rounded bg-white mt-5 mb-5">
    <div class="row" style="background-color: #53A8AF;">
        <div class="col-md-3">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQF2psCzfbB611rnUhxgMi-lc2oB78ykqDGYb4v83xQ1pAbhPiB&usqp=CAU"><span class="font-weight-bold">Amelly</span><span class="text-black-50">amelly12@bbb.com</span><span> </span></div>
        </div>
        <div class="col-md-5 ">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Perfil</h4>
                </div>
                <div class="row">
                <?php
    
                
                    echo" <div class='row mt-3'>
                    <div class='col-md-12'><label class='labels'>Nombre</label><input type='text' class='form-control' placeholder='enter phone number' value='$_SESSION[Nombre]'></div>
                <div class='row mt-3'>
                    <div class='col-md-12'><label class='labels'>Apellido Materno</label><input type='text' class='form-control' placeholder='enter phone number' value='$_SESSION[apellidom]'></div>
                   
                    <div class='col-md-12'><label class='labels'>Email ID</label><input type='text' class='form-control' placeholder='enter email id' value='$_SESSION[correo]'></div>
                    <div class='col-md-12'><label class='labels'>Education</label><input type='text' class='form-control' placeholder='education' value=''></div>
                </div>
                <div class='row mt-3'>
                    <div class='col-md-6'><label class='labels'>Country</label><input type='text' class='form-control' placeholder='country' value='$_SESSION[telefono]'></div>
                    <div class='col-md-6'><label class='labels'>State/Region</label><input type='text' class='form-control' value='' placeholder='state'></div>
                </div>";
                ?>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>
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