<?php
	
session_start();

//print_r($GLOBALS);

if($_COOKIE['PHPSESID'] == md5($_SESSION['ID'])){
	
	 require("mysql-to-json.php");
	
	$sql = "select firstname,lastname from user where id='".$_SESSION['ID']."'";
	//$sql = "select firstname, lastname from user where id='3'";
	
	$jsonData= getJSONFromDB($sql);
	$jsn=json_decode($jsonData);
	echo trim($jsn[0]->firstname)." ".trim($jsn[0]->lastname);
}
else{
	 echo "Server error!";
}
?>