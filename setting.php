<?php
	
session_start();

//print_r($GLOBALS);

if($_COOKIE['PHPSESID'] == md5($_SESSION['ID'])){
	
	require("mysql-to-json.php");
	
	//$sql = "select email from user where firstperson='".$_SESSION['ID']."'";
	$sql = "select email from user";
	
	$jsonData= getJSONFromDB($sql);
	$jsn=json_decode($jsonData);
	
	for($i=0; $i<sizeof($jsn); $i++){
		if(trim($jsn[$i]->email) == trim($_REQUEST['nm'])){
			$sql = "insert into user (password) values ('".md5($_REQUEST['ps'])."') where email='".$_REQUEST['nm']."'";
			if(ExecuteQuery($sql)){
				header("Location:Profile.php");
			}
			else{
				header("Location:settingMSG.php");
			}
		}
		else{
			header("Location:settingMSG.php");
		}
	}
}
else{
	 //echo "<a>No post</a>";
}
?>