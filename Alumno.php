<?php
class Alumno {

    public $alumno;
    private $id;
    private $nombre;
    private $avatar;
    private $orden;
    private $estatus;

    public function createAlumno(){
        echo "<br>Create Alumno";
    }
    public function readAlumnoG(){
        echo "<br>Read Alumno G";
    }
    public function readAlumnoS(){
        echo "<br>Read Alumno S";
    }
    public function deleteAlumno(){
        echo "<br>Delete Alumno";
    }
    public function updateAlumno(){
        echo "<br>Update Alumno";
    }
    public function asignarAlumnoGrupo1($id_alumno){
        //include('asignar-materias.php');
        echo "<div class=table-responsive>";
        echo "<table class=\"table table-striped\">";
        echo "<form action=TestMateria.php method=POST id=materias>";
        echo "<tr><td colspan=2 align=center><strong>Asignar Nuevas Materias</strong></td></tr>";
        echo "<tr><td>Alumno: </td><td><select id=materia name=materia>";
        $sql01 = "SELECT * FROM grupo WHERE estatus = 1 ORDER BY nombre ASC";
        $result01 = mysql_query($sql01)or die("Error $sql01");
        while($field = mysql_fetch_array($result01)){
            $id_grupo = $field['id_grupo'];
            $opcion = utf8_decode($field['nombre']);

            $sql03="SELECT * FROM alumno-grupo WHERE id_alumno = $id_alumno AND id_grupo = $id_grupo";
            $result03 = mysql_query($sql03)or die("No se ejecuta consulta $sql03");
            $existe = mysql_num_rows($result03);
            if($existe > 0){
                echo "<option value=0>No Disponible</option>";
            }else{
                echo "<option value=$id_grupo>$opcion</option>";
            }
        }
        echo "</select></td></tr>";
        //echo "<a href=\"javascript: enviar()\">Search</a>";
        echo "<input type=hidden id=accion name=accion value=1>";
        echo "<input type=hidden id=maestro name=maestro value=$id_maestro>";
        echo "<tr><td colspan=2 align=center><input type=submit value=Agregar></td></tr>"; // onclick=window.location.href='TestMateria.php?accion=1&maestro=$id_maestro'

        echo "</form>";
        echo "</table>";
        echo "</div>";

    }
    public function asignarGrupo(){
        echo "<br>Asignar Grupo";
    }
    public function createAlumnoGrupo($grupo_id, $alumno_id){
        //echo "<br> Materia: ".$materia_id;
        if ($alumno_id > 0){
            $insert01 = " INSERT INTO alumno-grupo (id_grupo, id_alumno)
                                 VALUES('$grupo_id','$alumno_id')";
            $execute01 = mysql_query($insert01) or die("Error  $insert01");
        }
    }

    public function deleteAlumnoGrupo($alumno_id, $grupo_id){
        if ($grupo_id > 0){
            $delete01 = "DELETE FROM alumno-grupo  WHERE id_alumno = $alumno_id AND id_grupo = $grupo_id";
            $delete01 = mysql_query($delete01) or die("Error  $delete01");
        }
    }

    public function seleccionaAlumno($alumno){
        echo "<div class=table-responsive>";
        echo "<form action=ajax.php method=Post name=maestro id=maestro target='_self'>";
        echo "<table class=\"table table-striped\">";

        echo "<tr><td>Alumno: </td><td><select name=idmae>";
        $sql02 = "SELECT * FROM usuario WHERE estatus = 1 AND nivel = 1 ORDER BY ApellidoPaterno ASC";
        echo $sql02;
        $result02 = mysql_query($sql02)or die("Error $sql02");
        if ($alumno != 0){
            $sql04 = "SELECT * FROM usuario WHERE id = $alumno";
            $result04 = mysql_query($sql04)or die("No se ejecuta consulta $sql04");
            $nombre = $maestro." ) ";
            $nombre .= mysql_result($result04,0,'ApellidoPaterno');
            $nombre .= " ".mysql_result($result04,0,'ApellidoMaterno');
            $nombre .= " ".mysql_result($result04,0,'nombre');
            $nombre = utf8_decode($nombre);
            echo "<option value=$alumno>$nombre</option>";
        }
        while($field = mysql_fetch_array($result02)){
            $id_alumno = utf8_decode($field['id']);
            $opcion = utf8_decode($field['id'].") ".$field['ApellidoPaterno']." ".$field['ApellidoMaterno']." ".$field['Nombre']);
            if ($alumno != $id_alumno)
                echo "<option value=$id_alumno>$opcion</option>";
        }
        echo "</select></td></tr>";

        echo "<tr><td colspan=2 align=center><input type=submit id=submit value=Seleccionar></td></tr>";
        echo "</table>";

        echo "</form>";
        echo "</div>";
    }
}