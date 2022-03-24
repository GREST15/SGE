<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/Miscss.css">
    <title>Inicio</title>
</head>
<body>

<?php
        session_start();
        if($_SESSION['TipoUsuario'] == 2)
        {
          require '../Plantillas/Headers/HeaderAlumno.php';
            ?>

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
    </div>
    </div>
    <script src="../js/bootstrap.min.js"></script>

<!--Calendario-->
<div class="calendar d-none d-sm-block"><div class="calendar__info">
  <div class="calendar__prev" id="prev-month">&#9664;</div>
  <div class="calendar__month" id="month"></div>
  <div class="calendar__year" id="year"></div>
  <div class="calendar__next" id="next-month">&#9654;</div>
</div>

<div class="calendar__week">
  <div class="calendar__day calendar__item">Lunes</div>
  <div class="calendar__day calendar__item">Martes</div>
  <div class="calendar__day calendar__item">Miercoles</div>
  <div class="calendar__day calendar__item">Jueves</div>
  <div class="calendar__day calendar__item">Viernes</div>
  <div class="calendar__day calendar__item">Sabado</div>
  <div class="calendar__day calendar__item">Domingo</div>
</div>
<!--Relleno-->
<div class="calendar__dates" id="dates"></div>
<script src="../js/calendar.js"></script>
</div>
<div class="card">
  <div class="card-body">
    El alcance de esta aplicación SGE (Sistema de Gestión Educativa) es que tanto alumnos y maestros puedan gestionar aspectos de la institución a la que pertenecen.
      Como maestro podrá programar tareas, subir calificaciones, registrar la asistencia incluso programar fechas de exámenes.
      Como alumno podrá ver las tareas pendientes de cada materia, con un sistema de recompensas para aquellos con buen desempeño (con el fin de dar un motivo más a ser responsable e incitar a quienes no lo son.), este sistema de recompensas se podrá intercambiar por artículos proporcionados por la misma institución.
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