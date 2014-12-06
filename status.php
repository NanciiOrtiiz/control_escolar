<?php
include 'library.php';
	$username 		= htmlentities($_POST['username']);
	$password 		= htmlentities(encrypt($_POST['password']));
$status= mysql_query('SELECT Estatus FROM usuario WHERE username = "'.$username.'" AND password = "'.$password.'" ');

	if($status == 1)
		{
			echo 1;
		}
		else
		{
			echo 2;
		}
	

?>