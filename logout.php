<?php
	session_start();
	
	$_SESSION['ID'] = "";
	
	setcookie("PHPSESID", $_SESSION['ID'], time() - 86400, "/");
			
	session_destroy();
	
	header("Location:index.php");

?>