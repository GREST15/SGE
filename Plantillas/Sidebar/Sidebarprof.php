    <!-- Sidebar-->
    
    <div class="bggreen" id="sidebar-wrapper">
        <div class="sidebar-heading bggreen text-center"> <h3 style="color: white;">Mis Materias</h3></div>
        <div class="list-group bggreen text-center">

         <?php
         $grupo=$_SESSION['usuario'];
         include '../Scripts/database.php';
         
                     $conexion = new Database();
                     $conexion->conectarDB();
                     $consulta="SELECT ID_Grupo_Materia,Materia,materias.Nombre_Materia as Materia, concat(grupos.Cuatrimestre,grupos.Seccion,grupos.Turno)as grupoo, Grupo from grupo_materias join materias on materias.ID_Materia=grupo_materias.Materia join grupos on grupos.ID_Grupo=grupo_materias.Grupo where Profesor= $grupo";
                     $table=$conexion->seleccionar($consulta);
                     
                     foreach($table as $registro)
                     {
                       echo"<div class='col-12'>
                       <a  href='../Paginas Profesor/AsignaturasP.php?IDgrupomateria=$registro->ID_Grupo_Materia&IDgrupo=$registro->Grupo'> <button type='button' class='btn button' id='materia1'>
                         <h5>$registro->Materia $registro->grupoo 
                         </h5>      
                       </button></a>
                     <hr>
                   </div> "; 
                      $conexion->desconectarDB();
                     }

      

        // echo"<div class='col-12'>
        //     <a data-bs-toggle='collapse' href='#collapseExample' role='button' aria-expanded='false' aria-controls='collapseExample' > <button type='button' class='btn button' id='materia1'>
        //       <h5>$registro->Materia
        //       </h5>
        //     </button></a>
        //   <hr>
        // </div>";
       ?>
        </div>
    </div>