<?php
   // require('Alumno.php');
    require('Grupo.php');
    require ('Conexion.php');
    require('header.php');

    $grupo = new Grupo();

        if(isset($_REQUEST['grupo'])){
            $id = $_REQUEST['grupo'];
        }else{
            $id = 0;
        }
        if(isset($_REQUEST['accion'])){
            $accion = $_REQUEST['accion'];
        }else{
            $accion = 0;
        }
        if(isset($_REQUEST['alumno'])){
            $id_grupo = $_REQUEST['alumno'];
        }else{
            $id_grupo = 0;
        }

        switch($accion){
            case 0:
                $grupo->asignarAlumnoGrupo($id_grupo);
                break;
            case 1:
                $grupo->createAlumnoGrupo($id,$id_grupo);
                $grupo->seleccionaAlumno($id);
                break;
            case 2:
                $grupo->deleteAlumnoGrupo($id,$id_grupo);
                $grupo->seleccionaAlumno($id);
                break;
        }

  //  $alumno->deleteUsuario(9);
require ('footer.php');

?>

