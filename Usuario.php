<?php

class Usuario 
{

        private $id;
        private $Nombre;
        private $ApellidoPaterno;
        private $ApellidoMaterno;
        private $Telefono;
        private $Calle;
        private $NumeroExterior;
        private $NumeroInterior;
        private $Colonia;
        private $Municipio;
        private $Estado;
        private $CP;
        private $Correo;
        private $Usuario;
        private $Contrasena;
        private $Nivel;
        private $Estatus;

        public function createUsuario($nombre,$apellidop,$apellidom,$Nivel)
		{
            //echo "<br>createUsuario";
            $insert01 = " INSERT INTO usuario (Nombre,ApellidoPaterno,ApellidoMaterno,Nivel,Estatus)VALUES('$nombre','$apellidop','$apellidom',$Nivel,1)";
            $execute01 = mysql_query($insert01) or die("Error  $insert01");
        }

        public function readUsuarioG()
		{
            //echo "<br><br>readusuarioG";
            $sql01 = "SELECT * FROM usuario WHERE estatus = 1 ORDER BY ApellidoPaterno ASC";
            $result01 = mysql_query($sql01)or die("Error $sql01");
            echo "<div>";
             echo "<center><table class='a_eTXTcontenido' id='usuarioc'>";
                echo "<tr><td colspan=5 align=center><strong><br><p class='a_eTXTsubtitle'> Busqueda General de Usuarios </p></strong></td></tr>";
                echo "<tr><td class='punteado'><span class='a_eTXTcontenido'>Id</span></td><td  class='punteado'><span class='a_eTXTcontenido'>Nombre</span></td><td class='punteado'><span class='a_eTXTcontenido'>Apellido Paterno</span></td><td class='punteado'><span class='a_eTXTcontenido'>Apellido Materno</span></td><td class='punteado'><span class='a_eTXTcontenido'>Nivel</span></td><tr>";
					while($field = mysql_fetch_array($result01))
					{
						$this->id = $field['id'];
						$this->Nombre = utf8_decode($field['Nombre']);
						$this->ApellidoPaterno = utf8_decode($field['ApellidoPaterno']);
						$this->ApellidoMaterno = utf8_decode($field['ApellidoMaterno']);
						$this->Nivel = $field['Nivel'];
						switch($this->Nivel)
						{
							case 1:
								$Nivel = "Administrador";
							break;
							case 2:
								$Nivel = "Maestro";
							break;
							case 3:
                            $Nivel = "Alumno";
							break;
						}
						echo "<tr><td class='punteado'>$this->id</td><td class='punteado'>$this->Nombre</td><td  class='punteado'>$this->ApellidoPaterno</td><td  class='punteado'>$this->ApellidoMaterno</td><td  class='punteado'>$Nivel</td></tr>";
					}
            echo "</table></center>";
            echo "</div>";
			echo"<br><br>";
        }
        public function readUsuarioS($id)
		{
            //echo "<br><br>readusuarioS";
            $sql01 = "SELECT * FROM usuario WHERE estatus = 1 AND id = $id ORDER BY ApellidoPaterno ASC";
            $result01 = mysql_query($sql01)or die("Error $sql01");
			echo"<br><br>";
			echo "<div>";
			echo "<center><table class='a_eTXTcontenido'>";
            echo "<tr><td  colspan=5 align=center><strong><p class='a_eTXTsubtitle'>Busqueda de usuario por ID</p></strong></td></tr>";
            echo "<tr><td  class='punteado'><span class='a_eTXTcontenido'>Id</span></td><td class='punteado'><span class='a_eTXTcontenido'>Nombre</span></td><td class='punteado'><span class='a_eTXTcontenido'>Apellido P</span></td><td class='punteado'><span class='a_eTXTcontenido'>Apellido M</span></td><td  class='punteado'><span class='a_eTXTcontenido'>Nivel</span></td><tr>";
            
			while($field = mysql_fetch_array($result01))
			{
                $this->id = $field['id'];
                $this->Nombre = $field['Nombre'];
                $this->ApellidoPaterno = utf8_decode($field['ApellidoPaterno']);
                $this->ApellidoMaterno = utf8_decode($field['ApellidoMaterno']);
                $this->Nivel = $field['Nivel'];
                switch($this->Nivel)
				{
                    case 1:
                        $Nivel = "Administrador";
                        break;
                    case 2:
                        $Nivel = "Maestro";
                        break;
                    case 3:
                        $Nivel = "Alumno";
                        break;
                }

                echo "<tr><td class='punteado'>$this->id</td><td class='punteado'>$this->Nombre</td><td class='punteado'>$this->ApellidoPaterno</td><td class='punteado'>$this->ApellidoMaterno</td><td class='punteado'>$Nivel</td></tr>";
			}
            echo "</table></center>";
            echo "</div>";
			echo"<br><br>";

        }

        public function updateUsuario($id,$nombre,$apellidop,$apellidom,$Nivel)
		{
            //echo "<br>updateUsuario";
            $delete01 = " UPDATE usuario SET Nombre='$nombre', ApellidoPaterno='$apellidop', ApellidoMaterno = '$apellidom', Nivel='$Nivel' WHERE id = $id";
            $execute01 = mysql_query($delete01) or die("Error  $delete01");
        }

        public function deleteUsuario($id)
		{
            //echo "<br>deleteUsuario";
            $delete01 = " DELETE FROM usuario WHERE id = $id";
            $execute01 = mysql_query($delete01) or die("Error  $delete01");
        }
}





