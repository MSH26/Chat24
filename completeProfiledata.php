<pre>
<?php

session_start();

print_r($GLOBALS);

if($_COOKIE['PHPSESID'] == md5($_SESSION['ID'])){
	
	require("mysql-to-json.php");
	
	if($_REQUEST['flag'] == 0){
		$sql = "update user set securityquestion='".$_REQUEST['question']."', securityanswer='".$_REQUEST['answer']."' where id='".$_SESSION['ID']."'";
		if(ExecuteQuery($sql)){
			echo "1";
		}
		else{
			echo "0";
		}
	}
}
else{
	echo "Unauthorized access attempt!!Uploading failed!";
}
?>
</pre>