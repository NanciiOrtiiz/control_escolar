<?php
include 'library.php';
if(isset($_SESSION['userid']) && $_SESSION['userid'] != '')
{
	echo '<script type="text/javascript">window.location = "index.php"; </script>';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<script type="text/javascript" src="jquery-1.9.1.js"></script>
<script type="text/javascript" src="scripts.js"></script>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" id="style" href="estilosDiseno.css"/>

</head>
<body>
<div id="navigation" align='center'>
<br>
<br><br>
<br><br>
 </div>
<form><center>
	<table class='a_eTXTcontenido'>
		<tr>
			<td colspan="2"><h3><p class='a_eTXTsubtitle'>Login</p></h3></td>
		</tr>
		<tr>
			<td colspan="2"><div  class="login_result"></div></td>
		</tr>
		<tr>
			<td class='punteado'>Username</td>
			<td ><input type="text" name="username" id="username" class='textbox'/></td>
		</tr>
		<tr>
			<td class='punteado'>Password</td>
			<td><input type="password" name="password" id="password" class='textbox'/></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" name="login" id="login" value="Entrar" class='boton'/></center></td>
		</tr>
	</table></center>
</form>

</body>
</html>