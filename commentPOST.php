<?php
	
session_start();

//print_r($GLOBALS);

if($_COOKIE['PHPSESID'] == md5($_SESSION['ID'])){
	
	require("mysql-to-json.php");
	
	$sql = "insert into comments (text, statusid, userid) values ('".$_REQUEST['msg']."', '".$_REQUEST['id']."', '".$_SESSION['ID']."')";
	
	if(ExecuteQuery($sql)){
		echo "1";
	}
	else {
		echo "0";
	}
}
else{
	 //echo "0";
}
?>