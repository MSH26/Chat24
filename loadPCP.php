<?php
	
session_start();

//print_r($GLOBALS);

if($_COOKIE['PHPSESID'] == md5($_SESSION['ID'])){
	
	 require("mysql-to-json.php");
	
	$sql = "select name from coverphotos where userid='".$_SESSION['ID']."' and state='active'";
	//$sql = "select name from coverphotos where userid='13' and state='active'";
	$jsonData= getJSONFromDB($sql);
	$jsn=json_decode($jsonData);
	echo trim($jsn[0]->name);
}
else{
	 echo "prof.png";
}
?>