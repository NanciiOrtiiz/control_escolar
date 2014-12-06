<?php
require ('header.php');
include 'library.php';
if(!isset($_SESSION['userid']) || $_SESSION['userid'] == '')
{
	echo '<script type="text/javascript">window.location = "login.php"; </script>';
}
?>
<h2><center><p class='a_eTXTsubtitle'> Bienvenido al Sistema</p> </center></h2>
<span class='a_eTXTcontenido'> <?php echo ucfirst($_SESSION['username']); ?></span>

<?php
require ('footer.php');
?>