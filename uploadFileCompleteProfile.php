<pre>
<?php

session_start();

//print_r($GLOBALS);

if($_COOKIE['PHPSESID'] == md5($_SESSION['ID'])){
	if(!$_FILES[$_REQUEST['name']]['tmp_name']){
		echo "Error: Please browse!";
	}
	else{
		$target_dir = "Uploads/";
		$target_file = $target_dir . $_FILES[$_REQUEST["name"]]["name"];
		if(move_uploaded_file($_FILES[$_REQUEST["name"]]["tmp_name"], $target_file)){
			require("mysql-to-json.php");
			
			if($_REQUEST['flag'] == 0){
				$sql = "insert into profilephotos (name, userid, state) values ('". $target_file."', '".$_SESSION['ID']."', 'active')";
				if(ExecuteQuery($sql)){
					echo "Profile picture uploaded";
				}
			}
			else if($_REQUEST['flag'] == 1){
				$sql = "insert into coverphotos (name, userid, state) values ('". $target_file."', '".$_SESSION['ID']."', 'active')";
				if(ExecuteQuery($sql)){
					echo "Cover picture uploaded";
				}
			}
		}	
		else {
			echo "Uploading failed!";
		}
	}
}
else{
	echo "Unauthorized access attempt!!Uploading failed!";
}
?>
</pre>