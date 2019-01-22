<?php
	
session_start();

//print_r($GLOBALS);

if($_COOKIE['PHPSESID'] == md5($_SESSION['ID'])){
	
	 require("mysql-to-json.php");
	
	$sql = "select email, phone from user where id='".$_SESSION['ID']."'";
	//$sql = "select email, phone from user where id='3'";
	$jsonData= getJSONFromDB($sql);
	$jsn=json_decode($jsonData);
	echo $jsn[0]->email."|".$jsn[0]->phone;
}
else{
	 echo "Server error!";
}
?>