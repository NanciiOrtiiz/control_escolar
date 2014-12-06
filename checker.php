<?php
include 'library.php';

function encrypt($string)
{
	return base64_encode(base64_encode(base64_encode($string)));
}
function decrypt($string)
{
	return base64_decode(base64_decode(base64_decode($string)));
}
if(isset($_POST['action']) && $_POST['action'] == 'login')
{ 
	$username 		= htmlentities($_POST['username']);
	$password 		= htmlentities(encrypt($_POST['password']));
	$query			= mysql_query('SELECT * FROM usuario WHERE username = "'.$username.'" AND password = "'.$password.'" '); 
	$status			= mysql_query('SELECT Estatus FROM usuario WHERE username = "'.$username.'" AND password = "'.$password.'" ');
	$num_rows		= mysql_num_rows($query); 
	if($num_rows <= 0)
	{
		echo 0;
	} 
		else 
		{
			$fetch = mysql_fetch_array($query);
			$_SESSION['userid'] 		= $fetch['id'];
			$_SESSION['username'] 	= $fetch['username'];
			echo 1;
		}
	
}
?>