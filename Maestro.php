<?php
    require('Usuario.php');
    class Maestro extends Usuario{

        private $materia;

        public function showGroups($id_maestro){
            $sql04 = "SELECT * FROM usuario WHERE id = $id_maestro";
            $result04 = mysql_query($sql04)or die("No se ejecuta consulta $sql04");
            $existe = mysql_num_rows($result04);
            if ($existe > 0) {
                $nombre = $id_maestro . " ) ";
                $nombre .= mysql_result($result04, 0, 'ApellidoPaterno');
                $nombre .= " " . mysql_result($result04, 0, 'ApellidoMaterno');
                $nombre .= " " . mysql_result($result04, 0, 'nombre');
                $nombre = utf8_decode($nombre);
                echo "<br><br><center><span class='a_eTXTcontenido'>Maestro Seleccionado: ".$nombre."</span></center>";
            }

            echo "<div>";
            echo "<center><table class='a_eTXTcontenido'>";
            echo "<tr><td  align=center><strong><br><br><span class='a_eTXTcontenido'>Materias Asignadas</span><br></strong></td></tr>";
            $sql01 = "SELECT * FROM maestro_materia WHERE id_maestro = $id_maestro GROUP BY id_materia";
            $result01 = mysql_query($sql01)or die("Error $sql01");
            while($field = mysql_fetch_array($result01)){
                $id = $field['id_materia'];
                $sql04 = "SELECT * FROM materia WHERE id = $id";
                $result04 = mysql_query($sql04)or die("No se ejecuta consulta $sql04");
                $nombre = utf8_decode(mysql_result($result04,0,'nombre'));
                echo "<tr><td class='punteado'><p class='a_eTXTcontenido'>$nombre</p></td></tr>";
            }
            echo "</table></center>";
            echo "</div>";
        }
    }


?>