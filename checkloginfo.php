<?php

session_start();

require("mysql-to-json.php");

$jsonData= getJSONFromDB("select * from user");

$check = false;
$jsn=json_decode($jsonData);

for($i=0;$i<sizeof($jsn);$i++){
	if(trim($_REQUEST['lg_email'])==trim($jsn[$i]->email) && trim(md5($_REQUEST['lg_password']))==trim($jsn[$i]->password)){
		$check = true;
		$_SESSION['ID'] = $jsn[$i]->id;
		setcookie("PHPSESID", md5($_SESSION['ID']), time() + 86400, "/");
		break;
	}
}

if($check == true){
	header("Location:Profile.php");
}
else if($check == false){
	header("Location:login_failure.html");
}
?>