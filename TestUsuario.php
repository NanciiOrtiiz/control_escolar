<?php
    require ('Usuario.php');
    require ('Conexion.php');
    require ('header.php');
    $usuario = new Usuario();
    if (isset($_POST['submit'])) {
                switch($_POST['submit']){
            case "Alta":
                echo "<div>";
                echo "<br>Bot&oacute;n: " . $_POST['submit'];
                echo "</div>";
                $usuario->createUsuario("$_POST[nombre]","$_POST[apellidop]","$_POST[apellidom]",$_POST['nivel']);
                break;
            case "Borrar":
                echo "<div>";
                echo "<br>Bot&oacute;n: " . $_POST['submit'];
                echo "</div>";
                $usuario->deleteUsuario($_POST['idb']);
                break;
            case "Modificar":
                echo "<div>";
                echo "<br>Bot&oacute;n: " . $_POST['submit'];
                echo "</div>";
                $usuario->updateUsuario($_POST['idm'],"$_POST[nombre]","$_POST[apellidop]","$_POST[apellidom]",$_POST['nivel']);
                break;
            case "Buscar":
                echo "<div>";
                echo "<br>Bot&oacute;n: " . $_POST['submit'];
                echo "</div>";
                $usuario->readUsuarioS($_POST['idbuscar']);
                break;
        }

    }
    echo "
        <div>
            <form name=alumno action=TestUsuario.php method=Post>
				<center>
				<table class='a_eTXTcontenido'>
					<tr><td colspan='2'><p class='a_eTXTsubtitle' align='center'>Alta de Usuarios</p></td></tr>
                    <tr> <td align='right'>Nombre(s):</td><td><input type=text name=nombre class='textbox'> </input></td> </tr>
                    <tr> <td align='right'>Apellido Paterno:</td><td><input type=text name=apellidop class='textbox'> </input></td> </tr>
                    <tr> <td align='right'>Apellido Materno:</td><td><input type=text name=apellidom class='textbox'> </input></td> </tr>
                    <tr><td align='right'>Nivel:</td><td><select name=nivel class='a_eTXTcontenido'>
                        <option value=1> Administrador</option>
                        <option value=2> Maestro</option>
                        <option value=3> Alumno</option>
                        </select></td></tr>
                    <tr><td colspan=2 align=center><input type=submit name=submit value=Alta class='boton'> </input></td></tr>
                    <tr><td>Modificar ID: <input type=text name=idm  class='textbox'></td><td><input type=submit name=submit value=Modificar class='boton'> </input></td></tr>

                    <tr><td>Borrar ID: <input type=text name=idb class='textbox'></td><td><input type=submit name=submit value=Borrar class='boton'> </input></td></tr>
                    <tr><td>Buscar ID: <input type=text name=idbuscar class='textbox'></td><td><input type=submit name=submit value=Buscar class='boton'> </input></td></tr>
                </table>
				</center>
            </form>
        </div>
    ";

    $usuario->readUsuarioG();

    require ('footer.php');
?>