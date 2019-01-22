<?php
	
session_start();

//print_r($GLOBALS);

if($_COOKIE['PHPSESID'] == md5($_SESSION['ID'])){
	
	require("mysql-to-json.php");
	$sql = "insert into conversation (msg, firstperson, secondperson, sender) values ('".$_REQUEST['msg']."', '".$_SESSION['ID']."', '".$_REQUEST['id']."', '".$_SESSION['ID']."')";
	//$sql = "insert into conversation (msg, firstperson, secondperson, sender) values ('".$_REQUEST['msg']."', '3', '4', '3')";
	
	if(ExecuteQuery($sql)){
		$sql = "insert into conversation (msg, firstperson, secondperson, sender) values ('".$_REQUEST['msg']."', '".$_REQUEST['id']."', '".$_SESSION['ID']."', '".$_SESSION['ID']."')";
		//$sql = "insert into conversation (msg, firstperson, secondperson, sender) values ('".$_REQUEST['msg']."', '4', '3', '3')";
		if(ExecuteQuery($sql)){
			echo "1";
		}
		else{
			if(ExecuteQuery($sql)){
				echo "1";
			}
			else{
				echo "0";
			}
		}
	}
	else{
		echo "0";
	}
}
else{
	 echo "0";
}
?>