
<?php

session_start();

//print_r($GLOBALS);

if($_COOKIE['PHPSESID'] == md5($_SESSION['ID'])){
	if($_REQUEST['flag'] == 0){
		if(!$_FILES[$_REQUEST['name']]['tmp_name']){
			//echo "Error: Please browse!";
		}
		else{
			$target_dir = "Uploads/";
			$target_file = $target_dir . $_FILES[$_REQUEST["name"]]["name"];
			if(move_uploaded_file($_FILES[$_REQUEST["name"]]["tmp_name"], $target_file)){
				require("mysql-to-json.php");
				
				$sql = "select id from photos where id=(select max(id) from photos)";
				$jsonData= getJSONFromDB($sql);
				$jsn=json_decode($jsonData);
				$v = 1;
				$a = ($jsn[0]->id)+$v;
				$sql = "insert into photos (id, name, userid) values ('".$a."','". $target_file."', '".$_SESSION['ID']."')";
				//$sql = "insert into photos (name, userid) values ('".$jsn[0]->id."','". $target_file."', '3')";
				if(ExecuteQuery($sql)){
					echo "Profile picture uploaded";
				}
				
				$sql = "insert into status (text, photoid, userid) values ( '".$_REQUEST['msg']."', '".$a."','".$_SESSION['ID']."')";

				if(ExecuteQuery($sql)){
					echo "status uploaded";
				}
			}	
			else {
				echo "Uploading failed!";
			}
		}
	}
	else if($_REQUEST['flag'] == 1){
		$sql = "insert into status (text, userid) values ( '".$_REQUEST['msg']."', '".$_SESSION['ID']."')";
			
			if(ExecuteQuery($sql)){
				echo "status uploaded";
			}
			else {
				echo "Uploading failed!";
			}
	}
	else if($_REQUEST['flag'] == 2){
		if(!$_FILES[$_REQUEST['name']]['tmp_name']){
			//echo "Error: Please browse!";
		}
		else{
			$target_dir = "Uploads/";
			$target_file = $target_dir . $_FILES[$_REQUEST["name"]]["name"];
			if(move_uploaded_file($_FILES[$_REQUEST["name"]]["tmp_name"], $target_file)){
				require("mysql-to-json.php");
				
				$sql = "select id from photos where id=(select max(id) from photos)";
				$jsonData= getJSONFromDB($sql);
				$jsn=json_decode($jsonData);
				$v = 1;
				$a = ($jsn[0]->id)+$v;
				$sql = "insert into photos (id, name, userid) values ('".$a."','". $target_file."', '".$_SESSION['ID']."')";
				//$sql = "insert into photos (name, userid) values ('".$jsn[0]->id."','". $target_file."', '3')";
				if(ExecuteQuery($sql)){
					echo "Profile picture uploaded";
				}
				
				$sql = "insert into status (photoid, userid) values ( '".$a."','".$_SESSION['ID']."')";

				if(ExecuteQuery($sql)){
					echo "status uploaded";
				}
			}	
			else {
				echo "Uploading failed!";
			}
		}
	}
}
else{
	echo "Unauthorized access attempt!!Uploading failed!";
}
?>