<?php
	
session_start();

//print_r($GLOBALS);

if($_COOKIE['PHPSESID'] == md5($_SESSION['ID'])){
	
	require("mysql-to-json.php");
	
	$sql = "select secondperson from friends where firstperson='".$_SESSION['ID']."'";
	//$sql = "select secondperson from friends where firstperson='3'";
	
	$jsonData= getJSONFromDB($sql);
	$jsn=json_decode($jsonData);
	for($i=0;$i<sizeof($jsn);$i++){
		$sql = "select firstname, lastname from user where id='".$jsn[$i]->secondperson."'";
		$jsonData= getJSONFromDB($sql);
		$jsnn=json_decode($jsonData);
		echo $jsn[$i]->secondperson.",".$jsnn[0]->firstname.",".$jsnn[0]->lastname;
		if($i<(sizeof($jsn)-1)){
			echo "|";
		}
	}
}
else{
	 echo "0";
}
?>