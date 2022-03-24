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
    <!--Carrusel-->
    <div style="width: 80%; margin: auto; text-align: center; margin-top: 50px;">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active w-1" >
            <img src="../img/Edcate.jfif" class="d-block w-100 text-center" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../img/Edcate2.jfif" class="d-block w-100 text-center" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../img/edcate3.jfif" class="d-block w-100" alt="...">
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>

        <?php echo $_SESSION['usuario'];?>
    </div>
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
    }
    ?>
</body>
</html>

