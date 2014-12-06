<script src="jquery.min.js"></script>

<?php
    require ('Conexion.php');
    require ('Materia.php');
    require ('header.php');
    $materia = new Materia();
    $id_maestro = $_POST['idmae'];
    $sql04 = "SELECT * FROM usuario WHERE id = $id_maestro";
    $result04 = mysql_query($sql04)or die("No se ejecuta consulta $sql04");
    $existe = mysql_num_rows($result04);
    if ($existe > 0) {
        $nombre = $id_maestro . " ) ";
        $nombre .= mysql_result($result04, 0, 'ApellidoPaterno');
        $nombre .= " " . mysql_result($result04, 0, 'ApellidoMaterno');
        $nombre .= " " . mysql_result($result04, 0, 'nombre');
        $nombre = utf8_decode($nombre);
        echo "<center><br><table><tr><td><p class='a_eTXTsubtitle'>Asignar Materia a Maestro</p></td></tr><tr><td><br><center><span class='a_eTXTcontenido'>Maestro Seleccionado</span></td></tr><tr><td><p class='a_eTXTcontenido'> ".$nombre."</p><br></td></tr></table></center>";
    }

    echo "<div>";
        echo "<center><table class='a_eTXTcontenido'>";
        echo "<tr><td colspan=2 align=center><strong><span class='a_eTXTcontenido'>Materias Asignadas</span><br></strong></td></tr>";
        $sql01 = "SELECT * FROM maestro_materia WHERE id_maestro = $id_maestro GROUP BY id_materia";
        $result01 = mysql_query($sql01)or die("Error $sql01");
        while($field = mysql_fetch_array($result01)){
            $id = $field['id_materia'];
                $sql04 = "SELECT * FROM materia WHERE id_materia = $id";
                $result04 = mysql_query($sql04)or die("No se ejecuta consulta $sql04");
                $nombre = utf8_decode(mysql_result($result04,0,'nombre'));
            echo "<tr><td class='punteado'>$nombre</td><td class='punteado'><a href=TestMateria.php?accion=2&maestro=$id_maestro&materia=$id><img border=0 src='cerrar.png'></a></td></tr>";
        }
        echo "</table></center>";
    echo "</div>";


    $materia->asignarMateriaMaestro($id_maestro);

    require ('footer.php');
?>



