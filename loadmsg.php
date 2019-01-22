<?php
	
session_start();

//print_r($GLOBALS);

if($_COOKIE['PHPSESID'] == md5($_SESSION['ID'])){
	
	require("mysql-to-json.php");
	
	$sql = "select msg from conversation where firstperson='".$_SESSION['ID']."' and secondperson='".$_REQUEST['id']."'";
	
	$jsonData= getJSONFromDB($sql);
	$jsn=json_decode($jsonData);
	for($i=0;$i<sizeof($jsn);$i++){
		echo $jsn[$i]->msg."|";
	}
}
else{
	 //echo "Server error!";
}
?>