<?php
class Materia {

    public $maestro;
    private $id;
    private $nombre;
    private $avatar;
    private $orden;
    private $estatus;

    public function createMateria(){
        echo "<br>Create Materia";
    }
    public function readMateriaG(){
        echo "<br>Read Materia G";
    }
    public function readMateriaS(){
        echo "<br>Read Materia S";
    }
    public function deleteMateria(){
        echo "<br>Delete Materia";
    }
    public function updateMateria(){
        echo "<br>Update Materia";
    }
    public function asignarMateriaMaestro($id_maestro){
        //include('asignar-materias.php');
        echo "<div>";
        echo "<center><table class='a_eTXTcontenido'>";
        echo "<form action=TestMateria.php method=POST id=materias>";
        echo "<tr><td colspan=2 align=center><br><br><span class='a_eTXTcontenido'>Asignar Nuevas Materias</span><br><br></td></tr>";
        echo "<tr><td>Materia: </td><td><select id=materia name=materia class='a_eTXTcontenido'>";
        $sql01 = "SELECT * FROM materia WHERE estatus = 1 ORDER BY nombre ASC";
        $result01 = mysql_query($sql01)or die("Error $sql01");
        while($field = mysql_fetch_array($result01)){
            $id_materia = $field['id_materia'];
            $opcion = utf8_decode($field['nombre']);

            $sql03="SELECT * FROM maestro_materia WHERE id_maestro = $id_maestro AND id_materia = $id_materia";
            $result03 = mysql_query($sql03)or die("No se ejecuta consulta $sql03");
            $existe = mysql_num_rows($result03);
            if($existe > 0){
                echo "<option value=0>No Disponible</option>";
            }else{
                echo "<option value=$id_materia>$opcion</option>";
            }
        }
        echo "</select></td></tr>";
        echo "<input type=hidden id=accion name=accion value=1>";
        echo "<input type=hidden id=maestro name=maestro value=$id_maestro>";
        echo "<tr><td colspan=2 align=center><input type=submit value=Agregar class='boton'></td></tr>"; // onclick=window.location.href='TestMateria.php?accion=1&maestro=$id_maestro'

        echo "</form>";
        echo "</table></center>";
        echo "</div>";

    }
    public function asignarMateriaGrupo(){
        echo "<br>Asignar Grupo";
    }
    public function createMaestroMateria($maestro_id, $materia_id){
        //echo "<br> Materia: ".$materia_id;
        if ($materia_id > 0){
            $insert01 = " INSERT INTO maestro_materia (id_maestro, id_materia)
                                 VALUES('$maestro_id','$materia_id')";
            $execute01 = mysql_query($insert01) or die("Error  $insert01");
        }
    }

    public function deleteMaestroMateria($maestro_id, $materia_id){
        if ($materia_id > 0){
            $delete01 = "DELETE FROM maestro_materia WHERE id_maestro = $maestro_id AND id_materia = $materia_id";
            $delete01 = mysql_query($delete01) or die("Error  $delete01");
        }
    }

    public function seleccionaMaestro($maestro){
        echo "<div>";
        echo "<form action=ajax.php method=Post name=maestro id=maestro target='_self'>";
        echo "<center><table class='a_eTXTcontenido'>";
		echo "<tr><td colspan='2'><br><p class='a_eTXTsubtitle'>Selecciona maestro</p></td></tr>";
        echo "<tr><td>Maestro: </td><td><select name=idmae class='a_eTXTcontenido'>";
        $sql02 = "SELECT * FROM usuario WHERE estatus = 1 AND nivel = 2 ORDER BY ApellidoPaterno ASC";
        $result02 = mysql_query($sql02)or die("Error $sql02");
        if ($maestro != 0){
            $sql04 = "SELECT * FROM usuario WHERE id = $maestro";
            $result04 = mysql_query($sql04)or die("No se ejecuta consulta $sql04");
            $nombre = $maestro." ) ";
            $nombre .= mysql_result($result04,0,'ApellidoPaterno');
            $nombre .= " ".mysql_result($result04,0,'ApellidoMaterno');
            $nombre .= " ".mysql_result($result04,0,'nombre');
            $nombre = utf8_decode($nombre);
            echo "<option value=$maestro>$nombre</option>";
        }
        while($field = mysql_fetch_array($result02)){
            $id_maestro = utf8_decode($field['id']);
            $opcion = utf8_decode($field['id'].") ".$field['ApellidoPaterno']." ".$field['ApellidoMaterno']." ".$field['Nombre']);
            if ($maestro != $id_maestro)
                echo "<option value=$id_maestro>$opcion</option>";
        }
        echo "</select></td></tr>";

        echo "<tr><td colspan=2 align=center><input type=submit id=submit value=Seleccionar class='boton'></td></tr>";
        echo "</table></center>";


        //echo "<div id=mensaje>";
        //echo "</div>";

        echo "</form>";
        echo "</div>";
    }
}